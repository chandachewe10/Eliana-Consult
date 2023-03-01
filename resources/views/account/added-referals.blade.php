@extends('layouts.account')

@section('content')




<div>
    


  
  
    <table id="referals" class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>No.</th>
                <th>Client Name</th>
                <th>Client Email</th>
                <th>Client Phone</th>
                <th>Client Address</th>
                <th>Required Service</th>
                <th>Agent Name</th>
                <th>Added On</th>
                <th>Status</th>
                @role('admin')
                <th>Action</th>
                @endrole
               
            </tr>
        </thead>
        <tbody>
            @foreach($referals as $referal)
            <tr>
                <td>{{ $referal->id }}</td>
                <td>{{ $referal->client_name }}</td>
                <td>{{ $referal->client_email }}</td>
                <td>{{ $referal->client_phone }}</td>
                <td>{{ $referal->client_address }}</td>
                <td>{{ $referal->client_required_service }}</td>
                <td>{{ \App\Models\User::find($referal->user_id)->name }}</td>
                <td><a href="">{{ date('d-F-Y',strtotime($referal->created_at)) }}</a></td>
                <td>{{ $referal->status == 0 ? 'Pending' : 'Approved' }}</a></td>
                @role('admin')
               @if($referal->status == 0)
                <td><a class="btn secondary-btn" href="{{route('referal.approve',$referal->id)}}">Accept</a> 
                <br>
                <a class="btn btn-danger" href="{{route('referal.denie',$referal->id)}}">Denie</a></td>
                @else 
                <td>N/A</td>
                @endif

        @endrole
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>   
$(document).ready( function () {
    $.noConflict();
    $('#active-loans').DataTable({
       
        dom: 'Bfrtip',
     
        buttons: [
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3,4,5]
                }
            },
          
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3,4,5]
                }
            },
            {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3,4,5]
                }
            },
            
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3,4,5]
                }
            
            },
            'colvis'
        ]
       
    });
});
</script>


@endsection