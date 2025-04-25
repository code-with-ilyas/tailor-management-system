
@extends('layouts.master')

@section('content')
<div class="contents">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12">
            <div class="contact-breadcrumb">
               <div class="breadcrumb-main add-contact justify-content-sm-between">
                  <div class="d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                     <div class="d-flex align-items-center add-contact__title justify-content-center me-sm-25">
                     </div>
                     <div class="action-btn mt-sm-0 mt-15">
                        <a href="{{ route('users.create') }}" class="btn px-20 btn-primary">Add New User</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-12 mb-30">
            <div class="card">
               <div class="card-header color-dark fw-500">User List</div>
               <div class="card-body">
                  @if(Session::has('message'))
                     <p class="alert alert-success">{{ Session::get('message') }}</p>
                  @endif
                  <table class="table table-hover table-bordered">
                     <thead class="thead-dark">
                        <tr>
                           <th>S.NO</th>
                           <th>Name</th>
                           <th>Email</th>
                           <th>Phone</th>
                           <th>Address</th>
                           <th>City</th>
                           <th>Type</th>
                           <th>Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                        @forelse($users as $user)
                           <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $user->phone }}</td>
                              <td>{{ $user->address }}</td>
                              <td>{{ $user->city }}</td>
                              <td>
                                 @if($user->type == 1)
                                    <span class="text-info">Admin</span>
                                 @elseif($user->type == 2)
                                    <span class="text-success">Customer</span>
                                 @else
                                    <span>Unknown</span>
                                 @endif
                              </td>
                              <td>
                                 <div class="btn-group" role="group" aria-label="Actions">
                                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm icon-btn">
                                    <i class="fas fa-eye"></i>
                                    </a>
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success btn-sm icon-btn">
                                       <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                       @csrf
                                       @method('DELETE')
                                       <button type="submit" class="btn btn-danger btn-sm icon-btn">
                                          <i class="fas fa-trash"></i>
                                       </button>
                                    </form>
                                 </div>
                              </td>
                           </tr>
                        @empty
                           <tr>
                              <td colspan="8" class="text-center">No users found.</td>
                           </tr>
                        @endforelse
                     </tbody>
                  </table>


                  <div>
                  {{ $users->links() }}
                  </div>



               </div>



            </div>
         </div>
      </div>
   </div>
</div>


<style>
   .icon-btn {
      padding: 0.25rem 0.5rem;
      margin: 0 3px;
   }
   .icon-btn .fas {
      font-size: 0.875rem;
      margin: 0 3px;
   }
</style>
@endsection


