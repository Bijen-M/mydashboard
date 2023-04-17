@extends('admin.cms_module.layouts.master')

@section('content')
<div class="content__body">
    <div class="card">
      <div class="card-header cardHeaderFlex">
        <h3 class="cardHeaderFlex__title mb-0">About Us Page Headings</h3>
        <div class="cardHeaderFlex__btn">
          <a href="{{route('about-us.create')}}"><button class="btn btn-md btn-info">New Heading<i class="ri-edit-box-line"></i> </button></a>
        </div>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table__center text-nowrap">
            <thead>
              <tr>
                <th>SN</th>
                <th>Title</th>
                <th>Subtitle</th>
                <th>Operation</th>
              </tr>
            </thead>

            <tbody>
              @if(sizeof($aboutUs) > 0)
                @foreach ($aboutUs as $idx => $aboutus)
                <tr>
                  <td>{{++$idx}}</td>
                  <td>{{ $aboutus->title }}</td>
                  <td>@if ($aboutus->type =='1')
                      About Us Section I
                      @elseif ($aboutus->type =='2')
                      About Us Section II
                      @else
                      About Us Page section
                      @endif
                  </td>
                  <td>
                    <div class="table__btn">
                      <a href="{{ route('about-us.edit', $aboutus->id) }}" class="btn btn-sm bg-primary-transparent text-primary">
                        <i class="ri-edit-box-line"></i>
                      </a>
                      <a href="#" class="btn btn-sm  bg-info-transparent text-info">
                        <i class="ri-eye-line"></i>
                      </a>
                      <a href="#" data-toggle="modal" data-target="#deleteAboutUs{{$aboutus->id}}" class="btn btn-sm  bg-danger-transparent text-danger">
                        <i class="ri-delete-bin-line"></i>
                      </a>
                     
                    </div>
              <div class="modal fade" id="deleteAboutUs{{$aboutus->id}}" tabindex="-1" role="dialog" aria-labelledby="myModal2" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
                  <div class="modal-content">
                    <div class="text-right cross"> 
                      <button type="button" class="close close__btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="ri-close-line"></i></span>
                      </button>
                    </div>
                    
                    <form
                    action="{{ route('about-us.destroy', $aboutus->id) }}"
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