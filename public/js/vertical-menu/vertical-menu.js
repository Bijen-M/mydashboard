! function(s, o, r) {
    "use strict";
    r.app = r.app || {};
    var l = r("body"),
      d = r(s),
      m = r('div[data-menu="menu-wrapper"]').html(),
      u = r('div[data-menu="menu-wrapper"]').attr("class");
    r.app.menu = {
      expanded: null,
      collapsed: null,
      hidden: null,
      container: null,
      horizontalMenu: !1,
      manualScroller: {
        obj: null,
        init: function() {
          r(".main-menu").hasClass("menu-dark");
          this.obj = new PerfectScrollbar(".main-menu-content", {
            suppressScrollX: !0,
            wheelPropagation: !1
          })
        },
        update: function() {
          if (this.obj) {
            if (!0 === r(".main-menu").data("scroll-to-active")) {
              var e, n, a;
              if (e = o.querySelector(".main-menu-content li.active"), l.hasClass("menu-collapsed")) r(".main-menu-content li.sidebar-group-active").length && (e = o.querySelector(".main-menu-content li.sidebar-group-active"));
              else if (n = o.querySelector(".main-menu-content"), e && (a = e.getBoundingClientRect().top + n.scrollTop), a > parseInt(2 * n.clientHeight / 3)) var i = a - n.scrollTop - parseInt(n.clientHeight / 2);
              setTimeout(function() {
                r.app.menu.container.stop().animate({
                  scrollTop: i
                }, 300), r(".main-menu").data("scroll-to-active", "false")
              }, 300)
            }
            this.obj.update()
          }
        },
        enable: function() {
          r(".main-menu-content").hasClass("ps") || this.init()
        },
        disable: function() {
          this.obj && this.obj.destroy()
        },
        updateHeight: function() {
          "vertical-menu" != l.data("menu") && "vertical-menu-modern" != l.data("menu") && "vertical-overlay-menu" != l.data("menu") || !r(".main-menu").hasClass("menu-fixed") || (r(".main-menu-content").css("height", r(s).height() - r(".header-navbar").height() - r(".main-menu-header").outerHeight() - r(".main-menu-footer").outerHeight()), this.update())
        }
      },
      init: function(e) {
        if (0 < r(".main-menu-content").length) {
          this.container = r(".main-menu-content");
          var n = "";
          if (!0 === e && (n = "collapsed"), "vertical-menu-modern" == l.data("menu")) {
            this.change(n)
          } else this.change(n)
        }
      },
      drillDownMenu: function(e) {
        r(".drilldown-menu").length && ("sm" == e || "xs" == e ? "true" == r("#navbar-mobile").attr("aria-expanded") && r(".drilldown-menu").slidingMenu({
          backLabel: !0
        }) : r(".drilldown-menu").slidingMenu({
          backLabel: !0
        }))
      },
      change: function(e, n) {
        var a = Unison.fetch.now();
        this.reset();
        var i, o, t = l.data("menu");
        if (a) switch (a.name) {
          case "xl":
            "vertical-overlay-menu" === t ? this.hide() : "collapsed" === e ? this.collapse(e) : this.expand();
            break;
          case "lg":
            "vertical-overlay-menu" === t || "vertical-menu-modern" === t || "horizontal-menu" === t ? this.hide() : this.collapse();
            break;
          case "md":
          case "sm":
          case "xs":
            this.hide()
        }
        "vertical-menu" !== t && "vertical-menu-modern" !== t || this.toOverlayMenu(a.name, t), l.is(".horizontal-layout") && !l.hasClass(".horizontal-menu-demo") && (this.changeMenu(a.name), r(".menu-toggle").removeClass("is-active")), "horizontal-menu" != t && this.drillDownMenu(a.name), "xl" == a.name && (r('body[data-open="hover"] .dropdown').on("mouseenter", function() {
          r(this).hasClass("show") ? r(this).removeClass("show") : r(this).addClass("show")
        }).on("mouseleave", function(e) {
          r(this).removeClass("show")
        }), r('body[data-open="hover"] .dropdown a').on("click", function(e) {
          if ("horizontal-menu" == t && r(this).hasClass("dropdown-toggle")) return !1
        })), r(".header-navbar").hasClass("navbar-brand-center") && r(".header-navbar").attr("data-nav", "brand-center"), "sm" == a.name || "xs" == a.name ? r(".header-navbar[data-nav=brand-center]").removeClass("navbar-brand-center") : r(".header-navbar[data-nav=brand-center]").addClass("navbar-brand-center"), r("ul.dropdown-menu [data-toggle=dropdown]").on("click", function(e) {
          0 < r(this).siblings("ul.dropdown-menu").length && e.preventDefault(), e.stopPropagation(), r(this).parent().siblings().removeClass("show"), r(this).parent().toggleClass("show")
        }), "horizontal-menu" == t && r("li.dropdown-submenu").on("mouseenter", function() {
          r(this).parent(".dropdown").hasClass("show") || r(this).removeClass("openLeft");
          var e = r(this).find(".dropdown-menu");
          if (e) {
            var n = r(s).height(),
              a = r(this).position().top,
              i = e.offset().left,
              o = e.width();
            if (n - a - e.height() - 28 < 1) {
              var t = n - a - 170;
              r(this).find(".dropdown-menu").css({
                "max-height": t + "px",
                "overflow-y": "auto",
                "overflow-x": "hidden"
              });
              new PerfectScrollbar("li.dropdown-submenu.show .dropdown-menu", {
                wheelPropagation: !1
              })
            }
            0 <= i + o - (s.innerWidth - 16) && r(this).addClass("openLeft")
          }
        }), "vertical-menu" !== t && "vertical-overlay-menu" !== t || (jQuery.expr[":"].Contains = function(e, n, a) {
          return 0 <= (e.textContent || e.innerText || "").toUpperCase().indexOf(a[3].toUpperCase())
        }, i = r("#main-menu-navigation"), o = r(".menu-search"), r(o).change(function() {
          var e = r(this).val();
          if (e) {
            r(".navigation-header").hide(), r(i).find("li a:not(:Contains(" + e + "))").hide().parent().hide();
            var n = r(i).find("li a:Contains(" + e + ")");
            n.parent().hasClass("has-sub") ? (n.show().parents("li").show().addClass("open").closest("li").children("a").show().children("li").show(), 0 < n.siblings("ul").length && n.siblings("ul").children("li").show().children("a").show()) : n.show().parents("li").show().addClass("open").closest("li").children("a").show()
          } else r(".navigation-header").show(), r(i).find("li a").show().parent().show().removeClass("open");
          return r.app.menu.manualScroller.update(), !1
        }).keyup(function() {
          r(this).change()
        }))
      },
      transit: function(e, n) {
        var a = this;
        l.addClass("changing-menu"), e.call(a), l.hasClass("vertical-layout") && (l.hasClass("menu-open") || l.hasClass("menu-expanded") ? (r(".menu-toggle").addClass("is-active"), "vertical-menu" === l.data("menu") && r(".main-menu-header") && r(".main-menu-header").show()) : (r(".menu-toggle").removeClass("is-active"), "vertical-menu" === l.data("menu") && r(".main-menu-header") && r(".main-menu-header").hide())), setTimeout(function() {
          n.call(a), l.removeClass("changing-menu"), a.update()
        }, 500)
      },
      open: function() {
        this.transit(function() {
          l.removeClass("menu-hide menu-collapsed").addClass("menu-open"), this.hidden = !1, this.expanded = !0, l.hasClass("vertical-overlay-menu") && (r(".sidenav-overlay").removeClass("d-none").addClass("d-block"), r("body").css("overflow", "hidden"))
        }, function() {
          !r(".main-menu").hasClass("menu-native-scroll") && r(".main-menu").hasClass("menu-fixed") && (this.manualScroller.enable(), r(".main-menu-content").css("height", r(s).height() - r(".header-navbar").height() - r(".main-menu-header").outerHeight() - r(".main-menu-footer").outerHeight())), l.hasClass("vertical-overlay-menu") || (r(".sidenav-overlay").removeClass("d-block d-none"), r("body").css("overflow", "auto"))
        })
      },
      hide: function() {
        this.transit(function() {
          l.removeClass("menu-open menu-expanded").addClass("menu-hide"), this.hidden = !0, this.expanded = !1, l.hasClass("vertical-overlay-menu") && (r(".sidenav-overlay").removeClass("d-block").addClass("d-none"), r("body").css("overflow", "auto"))
        }, function() {
          !r(".main-menu").hasClass("menu-native-scroll") && r(".main-menu").hasClass("menu-fixed") && this.manualScroller.enable(), l.hasClass("vertical-overlay-menu") || (r(".sidenav-overlay").removeClass("d-block d-none"), r("body").css("overflow", "auto"))
        })
      },
      expand: function() {
        !1 === this.expanded && ("vertical-menu-modern" == l.data("menu") && r(".modern-nav-toggle").find(".toggle-icon").removeClass("bx bx-circle").addClass("bx bx-disc"), this.transit(function() {
          l.removeClass("menu-collapsed").addClass("menu-expanded"), this.collapsed = !1, this.expanded = !0, r(".sidenav-overlay").removeClass("d-block d-none")
        }, function() {
          r(".main-menu").hasClass("menu-native-scroll") || "horizontal-menu" == l.data("menu") ? this.manualScroller.disable() : r(".main-menu").hasClass("menu-fixed") && this.manualScroller.enable(), "vertical-menu" != l.data("menu") && "vertical-menu-modern" != l.data("menu") || !r(".main-menu").hasClass("menu-fixed") || r(".main-menu-content").css("height", r(s).height() - r(".header-navbar").height() - r(".main-menu-header").outerHeight() - r(".main-menu-footer").outerHeight())
        }))
      },
      collapse: function(e) {
        !1 === this.collapsed && ("vertical-menu-modern" == l.data("menu") && r(".modern-nav-toggle").find(".toggle-icon").removeClass("bx bx-disc").addClass("bx bx-circle"), this.transit(function() {
          l.removeClass("menu-expanded").addClass("menu-collapsed"), this.collapsed = !0, this.expanded = !1, r(".content-overlay").removeClass("d-block d-none")
        }, function() {
          "horizontal-menu" == l.data("menu") && l.hasClass("vertical-overlay-menu") && r(".main-menu").hasClass("menu-fixed") && this.manualScroller.enable(), "vertical-menu" != l.data("menu") && "vertical-menu-modern" != l.data("menu") || !r(".main-menu").hasClass("menu-fixed") || r(".main-menu-content").css("height", r(s).height() - r(".header-navbar").height()), "vertical-menu-modern" == l.data("menu") && r(".main-menu").hasClass("menu-fixed") && this.manualScroller.enable()
        }))
      },
      toOverlayMenu: function(e, n) {
        var a = l.data("menu");
        "vertical-menu-modern" == n ? "lg" == e || "md" == e || "sm" == e || "xs" == e ? l.hasClass(a) && l.removeClass(a).addClass("vertical-overlay-menu") : l.hasClass("vertical-overlay-menu") && l.removeClass("vertical-overlay-menu").addClass(a) : "sm" == e || "xs" == e ? l.hasClass(a) && l.removeClass(a).addClass("vertical-overlay-menu") : l.hasClass("vertical-overlay-menu") && l.removeClass("vertical-overlay-menu").addClass(a)
      },
      changeMenu: function(e) {
        r('div[data-menu="menu-wrapper"]').html(""), r('div[data-menu="menu-wrapper"]').html(m), r(".menu-livicon").removeLiviconEvo(), r.each(r(".menu-livicon"), function(e) {
          var n = r(this),
            a = n.data("icon"),
            i = r("#main-menu-navigation").data("icon-style");
          n.addLiviconEvo({
            name: a,
            style: i,
            duration: .85,
            strokeWidth: "1.3px",
            eventOn: "parent",
            strokeColor: menuIconColorsObj.iconStrokeColor,
            solidColor: menuIconColorsObj.iconSolidColor,
            fillColor: menuIconColorsObj.iconFillColor,
            strokeColorAlt: menuIconColorsObj.iconStrokeColorAlt,
            afterAdd: function() {
              e === r(".main-menu-content .menu-livicon").length - 1 && r(".main-menu-content .nav-item a").on("mouseenter", function() {
                r(".main-menu-content .menu-livicon").length && (r(".main-menu-content .menu-livicon").stopLiviconEvo(), r(this).find(".menu-livicon").playLiviconEvo())
              })
            }
          })
        });
        var n = r('div[data-menu="menu-wrapper"]'),
          a = (r('div[data-menu="menu-container"]'), r('ul[data-menu="menu-navigation"]')),
          i = r('li[data-menu="dropdown"]'),
          o = r('li[data-menu="dropdown-submenu"]');
  
        function t(e) {
          e.updateLiviconEvo({
            strokeColor: menuActiveIconColorsObj.iconStrokeColor,
            solidColor: menuActiveIconColorsObj.iconSolidColor,
            fillColor: menuActiveIconColorsObj.iconFillColor,
            strokeColorAlt: menuActiveIconColorsObj.iconStrokeColorAlt
          })
        }
        "xl" === e ? (l.removeClass("vertical-layout vertical-overlay-menu fixed-navbar").addClass(l.data("menu")), r("nav.header-navbar").removeClass("fixed-top"), n.removeClass().addClass(u), this.drillDownMenu(e), r("a.dropdown-item.nav-has-children").on("click", function() {
          event.preventDefault(), event.stopPropagation()
        }), r("a.dropdown-item.nav-has-parent").on("click", function() {
          event.preventDefault(), event.stopPropagation()
        })) : (l.removeClass(l.data("menu")).addClass("vertical-layout vertical-overlay-menu fixed-navbar"), r("nav.header-navbar").addClass("fixed-top"), n.removeClass().addClass("main-menu menu-fixed menu-shadow"), "dark-layout" === l.data("layout") || "semi-dark-layout" === l.data("layout") ? n.addClass("menu-dark") : n.addClass("menu-light"), a.removeClass().addClass("navigation navigation-main"), i.removeClass("dropdown").addClass("has-sub"), i.find("a").removeClass("dropdown-toggle nav-link"), i.children("ul").find("a").removeClass("dropdown-item"), i.find("ul").removeClass("dropdown-menu"), o.removeClass().addClass("has-sub"), r.app.nav.init(), r("ul.dropdown-menu [data-toggle=dropdown]").on("click", function(e) {
          e.preventDefault(), e.stopPropagation(), r(this).parent().siblings().removeClass("open"), r(this).parent().toggleClass("open")
        })), r(".main-menu-content").find("li.active").parents("li").addClass("sidebar-group-active"), r(".nav-item.active .menu-livicon").length && t(r(".nav-item.active .menu-livicon")), r(".main-menu-content li.sidebar-group-active .menu-livicon").length && t(r(".main-menu-content li.sidebar-group-active .menu-livicon"))
      },
      toggle: function() {
        var e = Unison.fetch.now(),
          n = (this.collapsed, this.expanded),
          a = this.hidden,
          i = l.data("menu");
        switch (e.name) {
          case "xl":
            !0 === n ? "vertical-overlay-menu" == i ? this.hide() : this.collapse() : "vertical-overlay-menu" == i ? this.open() : this.expand();
            break;
          case "lg":
            !0 === n ? "vertical-overlay-menu" == i || "vertical-menu-modern" == i || "horizontal-menu" == i ? this.hide() : this.collapse() : "vertical-overlay-menu" == i || "vertical-menu-modern" == i || "horizontal-menu" == i ? this.open() : this.expand();
            break;
          case "md":
          case "sm":
          case "xs":
            !0 === a ? this.open() : this.hide()
        }
        this.drillDownMenu(e.name)
      },
      update: function() {
        this.manualScroller.update()
      },
      reset: function() {
        this.expanded = !1, this.collapsed = !1, this.hidden = !1, l.removeClass("menu-hide menu-open menu-collapsed menu-expanded")
      }
    }, r.app.nav = {
      container: r(".navigation-main"),
      initialized: !1,
      navItem: r(".navigation-main").find("li").not(".navigation-category"),
      config: {
        speed: 300
      },
      init: function(e) {
        this.initialized = !0, r.extend(this.config, e), this.bind_events()
      },
      bind_events: function() {
        var t = this;
        r(".navigation-main").on("mouseenter.app.menu", "li", function() {
          var e = r(this);
          if (r(".hover", ".navigation-main").removeClass("hover"), l.hasClass("menu-collapsed") && "vertical-menu-modern" != l.data("menu")) {
            r(".main-menu-content").children("span.menu-title").remove(), r(".main-menu-content").children("a.menu-title").remove(), r(".main-menu-content").children("ul.menu-content").remove();
            var n, a, i, o = e.find("span.menu-title").clone();
            if (e.hasClass("has-sub") || (n = e.find("span.menu-title").text(), a = e.children("a").attr("href"), "" !== n && ((o = r("<a>")).attr("href", a), o.attr("title", n), o.text(n), o.addClass("menu-title"))), i = e.css("border-top") ? e.position().top + parseInt(e.css("border-top"), 10) : e.position().top, "vertical-compact-menu" !== l.data("menu") && o.appendTo(".main-menu-content").css({
                position: "fixed",
                top: i
              }), e.hasClass("has-sub") && e.hasClass("nav-item")) {
              e.children("ul:first");
              t.adjustSubmenu(e)
            }
          }
          e.addClass("hover")
        }).on("mouseleave.app.menu", "li", function() {}).on("active.app.menu", "li", function(e) {
          r(this).addClass("active"), e.stopPropagation()
        }).on("deactive.app.menu", "li.active", function(e) {
          r(this).removeClass("active"), e.stopPropagation()
        }).on("open.app.menu", "li", function(e) {
          var n = r(this);
          if (n.addClass("open"), t.expand(n), r(".main-menu").hasClass("menu-collapsible")) return !1;
          n.siblings(".open").find("li.open").trigger("close.app.menu"), n.siblings(".open").trigger("close.app.menu"), e.stopPropagation()
        }).on("close.app.menu", "li.open", function(e) {
          var n = r(this);
          n.removeClass("open"), t.collapse(n), e.stopPropagation()
        }).on("click.app.menu", "li", function(e) {
          var n = r(this);
          n.is(".disabled") ? e.preventDefault() : l.hasClass("menu-collapsed") && "vertical-menu-modern" != l.data("menu") ? e.preventDefault() : n.has("ul") ? n.is(".open") ? n.trigger("close.app.menu") : n.trigger("open.app.menu") : n.is(".active") || (n.siblings(".active").trigger("deactive.app.menu"), n.trigger("active.app.menu")), e.stopPropagation()
        }), r(".navbar-header, .main-menu").on("mouseenter", function() {
          if ("vertical-menu-modern" == l.data("menu") && (r(".main-menu, .navbar-header").addClass("expanded"), l.hasClass("menu-collapsed"))) {
            0 === r(".main-menu li.open").length && r(".main-menu-content").find("li.active").parents("li").addClass("open");
            var e = r(".main-menu li.menu-collapsed-open"),
              n = e.children("ul");
            n.hide().slideDown(200, function() {
              r(this).css("display", "")
            }), e.addClass("open").removeClass("menu-collapsed-open")
          }
        }).on("mouseleave", function() {
          l.hasClass("menu-collapsed") && "vertical-menu-modern" == l.data("menu") && setTimeout(function() {
            if (0 === r(".main-menu:hover").length && 0 === r(".navbar-header:hover").length && (r(".main-menu, .navbar-header").removeClass("expanded"), l.hasClass("menu-collapsed"))) {
              var e = r(".main-menu li.open"),
                n = e.children("ul");
              e.addClass("menu-collapsed-open"), n.show().slideUp(200, function() {
                r(this).css("display", "")
              }), e.removeClass("open")
            }
          }, 1)
        }), r(".main-menu-content").on("mouseleave", function() {
          l.hasClass("menu-collapsed") && (r(".main-menu-content").children("span.menu-title").remove(), r(".main-menu-content").children("a.menu-title").remove(), r(".main-menu-content").children("ul.menu-content").remove()), r(".hover", ".navigation-main").removeClass("hover")
        }), r(".navigation-main li.has-sub > a").on("click", function(e) {
          e.preventDefault()
        }), r("ul.menu-content").on("click", "li", function(e) {
          var n = r(this);
          if (n.is(".disabled")) e.preventDefault();
          else if (n.has("ul"))
            if (n.is(".open")) n.removeClass("open"), t.collapse(n);
            else {
              if (n.addClass("open"), t.expand(n), r(".main-menu").hasClass("menu-collapsible")) return !1;
              n.siblings(".open").find("li.open").trigger("close.app.menu"), n.siblings(".open").trigger("close.app.menu"), e.stopPropagation()
            } else n.is(".active") || (n.siblings(".active").trigger("deactive.app.menu"), n.trigger("active.app.menu"));
          e.stopPropagation()
        })
      },
      adjustSubmenu: function(e) {
        var n, a, i, o, t, s = e.children("ul:first"),
          l = s.clone(!0);
        r(".main-menu-header").height(), n = e.position().top, i = d.height() - r(".header-navbar").height(), t = 0, s.height(), 0 < parseInt(e.css("border-top"), 10) && (t = parseInt(e.css("border-top"), 10)), o = i - n - e.height() - 30, r(".main-menu").hasClass("menu-dark"), a = n + e.height() + t, l.addClass("menu-popout").appendTo(".main-menu-content").css({
          top: a,
          position: "fixed",
          "max-height": o
        });
        new PerfectScrollbar(".main-menu-content > ul.menu-content", {
          wheelPropagation: !1
        })
      },
      collapse: function(e, n) {
        e.children("ul").show().slideUp(r.app.nav.config.speed, function() {
          r(this).css("display", ""), r(this).find("> li").removeClass("is-shown"), n && n(), r.app.nav.container.trigger("collapsed.app.menu")
        })
      },
      expand: function(e, n) {
        var a = e.children("ul"),
          i = a.children("li").addClass("is-hidden");
        a.hide().slideDown(r.app.nav.config.speed, function() {
          r(this).css("display", ""), n && n(), r.app.nav.container.trigger("expanded.app.menu")
        }), setTimeout(function() {
          i.addClass("is-shown"), i.removeClass("is-hidden")
        }, 0)
      },
      refresh: function() {
        r.app.nav.container.find(".open").removeClass("open")
      }
    }
  }(window, document, jQuery);
  
  // 2 menu //
  ! function(o, r, p) {
    "use strict";
    var c = p("html"),
      d = p("body"),
      u = "#FF5B5C";
    if (p(o).scroll(function() {
        var e;
        60 < (e = p(o).scrollTop()) ? p("body").addClass("navbar-scrolled") : p("body").removeClass("navbar-scrolled"), 20 < e ? p("body").addClass("page-scrolled") : p("body").removeClass("page-scrolled")
      }), p(o).on("load", function() {
        var a = !1;
  
        function e(e) {
          e.updateLiviconEvo({
            strokeColor: menuActiveIconColorsObj.iconStrokeColor,
            solidColor: menuActiveIconColorsObj.iconSolidColor,
            fillColor: menuActiveIconColorsObj.iconFillColor,
            strokeColorAlt: menuActiveIconColorsObj.iconStrokeColorAlt
          })
        }
        d.hasClass("menu-collapsed") && (a = !0), p("html").data("textdirection"), setTimeout(function() {
          c.removeClass("loading").addClass("loaded")
        }, 1200), p.app.menu.init(a), p.each(p(".menu-livicon"), function(e) {
          var a = p(this),
            n = a.data("icon"),
            t = p("#main-menu-navigation").data("icon-style");
          a.addLiviconEvo({
            name: n,
            style: t,
            duration: .85,
            strokeWidth: "1.3px",
            eventOn: "none",
            strokeColor: menuIconColorsObj.iconStrokeColor,
            solidColor: menuIconColorsObj.iconSolidColor,
            fillColor: menuIconColorsObj.iconFillColor,
            strokeColorAlt: menuIconColorsObj.iconStrokeColorAlt,
            afterAdd: function() {
              e === p(".main-menu-content .menu-livicon").length - 1 && p(".main-menu-content .nav-item a").on("mouseenter", function() {
                p(".main-menu-content .menu-livicon").length && (p(".main-menu-content .menu-livicon").stopLiviconEvo(), p(this).find(".menu-livicon").playLiviconEvo())
              })
            }
          })
        });
        !1 === p.app.nav.initialized && p.app.nav.init({
          speed: 300
        }), Unison.on("change", function(e) {
          p.app.menu.change(a)
        }), p('[data-toggle="tooltip"]').tooltip({
          container: "body"
        }), p(".tooltip-horizontal-bookmark").tooltip({
          customClass: "tooltip-horizontal-bookmark"
        }), 0 < p(".navbar-hide-on-scroll").length && (p(".navbar-hide-on-scroll.fixed-top").headroom({
          offset: 205,
          tolerance: 5,
          classes: {
            initial: "headroom",
            pinned: "headroom--pinned-top",
            unpinned: "headroom--unpinned-top"
          }
        }), p(".navbar-hide-on-scroll.fixed-bottom").headroom({
          offset: 205,
          tolerance: 5,
          classes: {
            initial: "headroom",
            pinned: "headroom--pinned-bottom",
            unpinned: "headroom--unpinned-bottom"
          }
        })), p('a[data-action="collapse"]').on("click", function(e) {
          e.preventDefault(), p(this).closest(".card").children(".card-content").collapse("toggle"), p(this).closest(".card").children(".card-header").css("padding-bottom", "1.5rem"), p(this).closest(".card").find('[data-action="collapse"]').toggleClass("rotate")
        }), p('a[data-action="expand"]').on("click", function(e) {
          e.preventDefault(), p(this).closest(".card").find('[data-action="expand"] i').toggleClass("bx-fullscreen bx-exit-fullscreen"), p(this).closest(".card").toggleClass("card-fullscreen")
        }), p(".scrollable-container").each(function() {
          new PerfectScrollbar(p(this)[0], {
            wheelPropagation: !1
          })
        }), p(".main-menu-content").find("li.active").parents("li").addClass("sidebar-group-active"), p(".nav-item.active .menu-livicon").length && e(p(".nav-item.active .menu-livicon")), p(".main-menu-content li.sidebar-group-active .menu-livicon").length && e(p(".main-menu-content li.sidebar-group-active .menu-livicon"));
        var n = d.data("menu");
        "horizontal-menu" != n && !1 === a && p(".main-menu-content").find("li.active").parents("li").addClass("open"), "horizontal-menu" == n && (p(".main-menu-content").find("li.active").parents("li:not(.nav-item)").addClass("open"), p(".main-menu-content").find("li.active").parents("li").addClass("active")), p(".heading-elements-toggle").on("click", function() {
          p(this).next(".heading-elements").toggleClass("visible")
        });
        
        var l = r.getElementsByClassName("main-menu-content");
        0 < l.length && l[0].addEventListener("ps-scroll-y", function() {
          0 < p(this).find(".ps__thumb-y").position().top ? p(".shadow-bottom").css("display", "block") : p(".shadow-bottom").css("display", "none")
        })
      }), p(r).on("click", ".sidenav-overlay", function(e) {
        return p.app.menu.hide(), !1
      }), "undefined" != typeof Hammer) {
      var e = r.querySelector(".drag-target");
      if (0 < p(e).length) new Hammer(e).on("panright", function(e) {
        if (d.hasClass("vertical-overlay-menu")) return p.app.menu.open(), !1
      });
      setTimeout(function() {
        var e, a = r.querySelector(".main-menu");
        0 < p(a).length && ((e = new Hammer(a)).get("pan").set({
          direction: Hammer.DIRECTION_ALL,
          threshold: 100
        }), e.on("panleft", function(e) {
          if (d.hasClass("vertical-overlay-menu")) return p.app.menu.hide(), !1
        }))
      }, 300);
      var a = r.querySelector(".sidenav-overlay");
      if (0 < p(a).length) new Hammer(a).on("panleft", function(e) {
        if (d.hasClass("vertical-overlay-menu")) return p.app.menu.hide(), !1
      })
    }
    p(r).on("click", ".menu-toggle, .modern-nav-toggle", function(e) {
      return e.preventDefault(), p.app.menu.toggle(), setTimeout(function() {
        p(o).trigger("resize")
      }, 200), 0 < p("#collapsed-sidebar").length && setTimeout(function() {
        d.hasClass("menu-expanded") || d.hasClass("menu-open") ? p("#collapsed-sidebar").prop("checked", !1) : p("#collapsed-sidebar").prop("checked", !0)
      }, 1e3), p(".vertical-overlay-menu .navbar-with-menu .navbar-container .navbar-collapse").hasClass("show") && p(".vertical-overlay-menu .navbar-with-menu .navbar-container .navbar-collapse").removeClass("show"), !1
    }), p(".navigation").find("li").has("ul").addClass("has-sub"), p(".carousel").carousel({
      interval: 2e3
    }), p(".nav-link-expand").on("click", function(e) {
      "undefined" != typeof screenfull && screenfull.enabled && screenfull.toggle()
    }), "undefined" != typeof screenfull && screenfull.enabled && p(r).on(screenfull.raw.fullscreenchange, function() {
      screenfull.isFullscreen ? (p(".nav-link-expand").find("i").toggleClass("bx-exit-fullscreen bx-fullscreen"), p("html").addClass("full-screen")) : (p(".nav-link-expand").find("i").toggleClass("bx-fullscreen bx-exit-fullscreen"), p("html").removeClass("full-screen"))
    }), p(r).ready(function() {
      p(".step-icon").each(function() {
        var e = p(this);
        0 < e.siblings("span.step").length && (e.siblings("span.step").empty(), p(this).appendTo(p(this).siblings("span.step")))
      })
    }), p(o).resize(function() {
      p.app.menu.manualScroller.updateHeight();
      var e = r.getElementsByClassName("main-menu-content");
      0 < e.length && e[0].addEventListener("ps-scroll-y", function() {
        0 < p(this).find(".ps__thumb-y").position().top ? p(".shadow-bottom").css("display", "block") : p(".shadow-bottom").css("display", "none")
      })
    }), p("#sidebar-page-navigation").on("click", "a.nav-link", function(e) {
      e.preventDefault(), e.stopPropagation();
      var a = p(this),
        n = a.attr("href"),
        t = p(n).offset().top - 80;
      p("html, body").animate({
        scrollTop: t
      }, 0), setTimeout(function() {
        a.parent(".nav-item").siblings(".nav-item").children(".nav-link").removeClass("active"), a.addClass("active")
      }, 100)
    })
    
  }(window, document, jQuery);