@extends('admin.cms_module.layouts.master')

@section('content')
<div class="content__body">
    <div class="card">
      <div class="card-header cardHeaderFlex">
        <h3 class="cardHeaderFlex__title mb-0">Simple Table</h3>
        <div class="cardHeaderFlex__btn">
          <button type="submit" class="btn btn-md btn-success">All <i class="ri-list-settings-line"></i> </button>
          <button type="submit" class="btn btn-md btn-primary">Pages <i class="ri-pages-line"></i> </button>
          <button type="submit" class="btn btn-md btn-danger">Trash <i class="ri-delete-bin-line"></i> </button>
          <button type="submit" class="btn btn-md btn-info">Create <i class="ri-edit-box-line"></i> </button>
        </div>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table__center text-nowrap">
            <thead>
              <tr>
                <th>SN</th>
                <th>Title</th>
                <th>Backend</th>
                <th>Created By : </th>
                <th>Team Member</th>
                <th>Operation</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>1</td>
                <td>Think about business content?</td>
                <td>Python</td>
                <td>User Admin</td>
                <td>16 Member</td>
                <td>
                  <div class="table__btn">
                    <a href="#" class="btn btn-sm  bg-primary-transparent text-primary">
                      <i class="ri-edit-box-line"></i>
                    </a>
                    <a href="#" class="btn btn-sm  bg-info-transparent text-info">
                      <i class="ri-eye-line"></i>
                    </a>
                    <a href="#" class="btn btn-sm  bg-danger-transparent text-danger">
                      <i class="ri-delete-bin-line"></i>
                    </a>
                    <a href="#" class="btn btn-sm  bg-success-transparent text-success">
                      <i class="ri-printer-line"></i>
                    </a>
                  </div>
                </td>
              </tr>

              <tr>
                <td>2</td>
                <td>Aenean eu pharetra arcu, vitae elementum sem. Sed non</td>
                <td>Laravel</td>
                <td>User Admin</td>
                <td>16 Member</td>
                <td>
                  <div class="table__btn">
                    <a href="#" class="btn btn-sm  bg-primary-transparent text-primary">
                      <i class="ri-edit-box-line"></i>
                    </a>
                    <a href="#" class="btn btn-sm  bg-info-transparent text-info">
                      <i class="ri-eye-line"></i>
                    </a>
                    <a href="#" class="btn btn-sm  bg-danger-transparent text-danger">
                      <i class="ri-delete-bin-line"></i>
                    </a>
                    <a href="#" class="btn btn-sm  bg-success-transparent text-success">
                      <i class="ri-printer-line"></i>
                    </a>
                  </div>
                </td>
              </tr>

              <tr>
                <td>3</td>
                <td>Think about business content?</td>
                <td>Python</td>
                <td>User Admin</td>
                <td>16 Member</td>
                <td>
                  <div class="table__btn">
                    <a href="#" class="btn btn-sm  bg-primary-transparent text-primary">
                      <i class="ri-edit-box-line"></i>
                    </a>
                    <a href="#" class="btn btn-sm  bg-info-transparent text-info">
                      <i class="ri-eye-line"></i>
                    </a>
                    <a href="#" class="btn btn-sm  bg-danger-transparent text-danger">
                      <i class="ri-delete-bin-line"></i>
                    </a>
                    <a href="#" class="btn btn-sm  bg-success-transparent text-success">
                      <i class="ri-printer-line"></i>
                    </a>
                  </div>
                </td>
              </tr>

              <tr>
                <td>4</td>
                <td>Aenean eu pharetra arcu, vitae elementum sem. Sed non</td>
                <td>Laravel</td>
                <td>User Admin</td>
                <td>16 Member</td>
                <td>
                  <div class="table__btn">
                    <a href="#" class="btn btn-sm  bg-primary-transparent text-primary">
                      <i class="ri-edit-box-line"></i>
                    </a>
                    <a href="#" class="btn btn-sm  bg-info-transparent text-info">
                      <i class="ri-eye-line"></i>
                    </a>
                    <a href="#" class="btn btn-sm  bg-danger-transparent text-danger">
                      <i class="ri-delete-bin-line"></i>
                    </a>
                    <a href="#" class="btn btn-sm  bg-success-transparent text-success">
                      <i class="ri-printer-line"></i>
                    </a>
                  </div>
                </td>
              </tr>


            </tbody>
          </table>
        </div>
      </div>
    </div>

</div>
@endsection