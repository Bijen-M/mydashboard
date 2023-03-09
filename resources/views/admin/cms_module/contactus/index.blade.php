@extends('admin.cms_module.layouts.master')

@section('content')
<div class="content__body">
  <div class="card">
    <div class="card-header cardHeaderFlex">
      <h3 class="cardHeaderFlex__title mb-0"> Contacts </h3>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table__center text-nowrap">
          <thead>
            <tr>
              <th>SN</th>
              <th>Name</th>
              <th>Email</th>
              <th>Subject</th>
              <th>Operation</th>
            </tr>
          </thead>

          <tbody>
            @if(sizeof($contacts) > 0)
              @foreach ($contacts as $idx => $contact)
              <tr>
                <td>{{++$idx}}</td>
                <td>{{ $contact->full_name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->subject }}</td>
                <td>{{ $contact->created_at->format('Y-m-d') }}</td>
                <td>
                  <div class="table__btn">
                    <a href="#" data-toggle="modal" data-target="#deletecontact{{$contact->id}}" class="btn btn-sm  bg-danger-transparent text-danger">
                      <i class="ri-delete-bin-line"></i>
                    </a>
                  </div>
            <div class="modal fade" id="deletecontact{{$contact->id}}" tabindex="-1" role="dialog" aria-labelledby="myModal2" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
                <div class="modal-content">
                  <div class="text-right cross"> 
                    <button type="button" class="close close__btn" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true"><i class="ri-close-line"></i></span>
                    </button>
                  </div>
                  
                  <form
                  action="{{ route('contactus.destroy', $contact) }}"
                  method="POST">
                  @csrf
                  @method('DELETE')
                  <div class="modal-body text-center modal__body--custom">
                    <div class="confirm__infos text-danger">
                      <i class="ri-information-fill"></i>
                    </div>

                    <h4>Are you sure want to delete this contact?</h4>
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
    <script type="text/javascript" src="{{ asset('js/datatable/dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/datatable/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function() {
            $('#basicExample').DataTable({
                'iDisplayLength': 6,
                "language": {
                    "lengthMenu": "Display _MENU_ Records Per Page",
                    "info": "Showing Page _PAGE_ of _PAGES_",
                }
            });
        });
        // Vertical Scroll
        $(function() {
            $('#scrollVertical').DataTable({
                "scrollY": "400px",
                "scrollCollapse": true,
                "paging": false,
                "bInfo": false,
            });
        });
    </script>
@endsection
<tbody>
  @if (count($contacts) > 0)
      <tr>
          @foreach ($contacts as $contact)
              <td>{{ $contact->full_name }}</td>
              <td>{{ $contact->email }}</td>
              <td>{{ $contact->subject }}</td>
              <td>{{ $contact->created_at->format('Y-m-d') }}</td>
              {{-- <td>
                  <div class="table__btn">
                      <a href="#" class="btn btn-sm  bg-info-transparent text-info">
                          <i class="ri-eye-line"></i>
                      </a>
                      <a href="#" data-toggle="modal"
                          data-target="#deletecontact{{ $contact->id }}"
                          class="btn btn-sm  bg-danger-transparent text-danger">
                          <i class="ri-delete-bin-line"></i>
                      </a>
                  </div>
                  <div class="modal fade" id="deletecontact{{ $contact->id }}" tabindex="-1"
                      role="dialog" aria-labelledby="myModal2" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-dialog-zoom"
                          role="document">
                          <div class="modal-content">
                              <div class="text-right cross">
                                  <button type="button" class="close close__btn"
                                      data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true"><i
                                              class="ri-close-line"></i></span>
                                  </button>
                              </div>

                              <form action="{{ route('about-us.destroy', $contact->id) }}"
                                  method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <div class="modal-body text-center modal__body--custom">
                                      <div class="confirm__infos text-danger">
                                          <i class="ri-information-fill"></i>
                                      </div>

                                      <h4>Are you sure want to delete this heading?</h4>
                                  </div>

                                  <div class="modal-footer custom">

                                      <div class="left-side">
                                          <button type="button" class="btn text-success"
                                              data-dismiss="modal">Cancel</button>
                                      </div>
                                      <div class="divider"></div>
                                      <div class="right-side">
                                          <input type="submit" value="Delete"
                                              class="btn text-danger "></button>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </td> --}}
          @endforeach
      </tr>
  @else
      <tr>
          ----------No data found----------
      </tr>
  @endif
</tbody>