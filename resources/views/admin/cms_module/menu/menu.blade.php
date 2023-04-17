@extends('admin.cms_module.layouts.master')
@section('content')
<div class="content__body">
    <div class="card">
      <div class="card-header cardHeaderFlex">
        <h3 class="cardHeaderFlex__title mb-0">Menu</h3>
        <div class="cardHeaderFlex__btn">
          <a href="{{route('menus.create')}}"><button class="btn btn-md btn-info">New Menu<i class="ri-edit-box-line"></i> </button></a>
        </div>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table__center text-nowrap">
            <thead>
              <tr>
                <th>Set Order</th>
                <th>SN</th>
                <th>Title</th>
				        <th>Children</th>
                <th>Operation</th>
              </tr>
            </thead>

            <tbody id = "tablecontents">
              @if(sizeof($menus) > 0)
                @foreach ($menus as $idx => $menu)
                <tr class = "row1" data-id = "{{ $menu->id}}">
                  <td class = "sortHandle"><i class="ri-arrow-up-down-line" style="cursor: pointer"></i></td>
                  <td>{{$menu->sortorder}}</td>
                  <td>{{ $menu->title }}</td>
                  <td>
					<a href="{{ route('menus.children.index', $menu->id)}}">{{ $menu->children->count() }}</a>
				  </td>
                  <td>
                    <div class="table__btn">
                      <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-sm bg-primary-transparent text-primary">
                        <i class="ri-edit-box-line"></i>
                      </a>
                      <a href="#" class="btn btn-sm  bg-info-transparent text-info">
                        <i class="ri-eye-line"></i>
                      </a>
                      <a href="#" data-toggle="modal" data-target="#deletemenu{{$menu->id}}" class="btn btn-sm  bg-danger-transparent text-danger">
                        <i class="ri-delete-bin-line"></i>
                      </a>
                      <a href="#"  class="btn btn-sm  bg-success-transparent text-success">
                        <i class="ri-printer-line"></i>
                      </a>
                    </div>
              <div class="modal fade" id="deletemenu{{$menu->id}}" tabindex="-1" role="dialog" aria-labelledby="myModal2" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
                  <div class="modal-content">
                    <div class="text-right cross"> 
                      <button type="button" class="close close__btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="ri-close-line"></i></span>
                      </button>
                    </div>
                    
                    <form
                    action="{{ route('menus.destroy', $menu->id) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body text-center modal__body--custom">
                      <div class="confirm__infos text-danger">
                        <i class="ri-information-fill"></i>
                      </div>

                      <h4>Are you sure want to delete this menu?</h4>
                    </div>

                    <div class="modal-footer custom">

                      <div class="left-side">
                        <button type="button" class="btn text-success" data-dismiss="modal">Cancel</button>
                      </div>
                      <div class="divider"></div>
                      <div class="right-side">
                        <input type="submit" value="Delete" class="btn text-danger "></button>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
                  </td>
                </tr>
                @endforeach
              @else
                <td>--- No data found ---</td>
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>

</div>
@endsection
@section('footer_resources')
<script type="text/javascript" src="//code.jquery.com/ui/1.12.1/jquery-ui.js" ></script>
<script type="text/javascript">
  $(function () {
  // $("#table").DataTable();

  var fixHelper = function (e, ui) {
  ui.children().each(function () {
      $(this).width($(this).width());
  });

  return ui;
  };

 
  $( "#tablecontents" ).sortable({
    helper: fixHelper,
    handle: '.sortHandle',
    items: "tr",
    cursor: 'move',
    opacity: 0.6,
    update: function() {
        sendOrderToServer();
    }
  });

  function sendOrderToServer() {

    var order = [];
    $('tr.row1').each(function(index,element) {
      order.push({
        id: $(this).attr('data-id'),
        position: index+1
      });
    });

    $.ajax({
      type: "POST", 
      dataType: "json", 
      url: "{{ url('admin/menus/updateorder') }}",
      data: {
        sortorder:order,
        _token: '{{csrf_token()}}'
      },
      success: function(response) {
          console.log('hereis');
          if (response.status == "success") {
            console.log(response);
          } else {
            console.log(response);
          }
      }
    });

  }
});
</script>
@endsection