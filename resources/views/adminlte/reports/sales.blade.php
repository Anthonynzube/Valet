@extends('adminlte.layout.app')

@section('title', 'Sales Report')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sales Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Sales</li>
              <li class="breadcrumb-item active">Report</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Sales Report</h3>

          <div class="card-tools">
          <a href="{{ route('saleReportDownload') }}" class="btn btn-success ">Save as PDF</a>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <!-- <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button> -->
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          S/N
                      </th>
                      <th style="width: 20%">
                        Car Reg No
                      </th>
                      <th style="width: 20%">
                        Service(s)
                      </th>
                      <th style="width: 20%">
                        Washed By
                      </th>
                      <th style="width: 10%">
                        Date
                      </th>
                      <th style="width: 8%">
                        Total
                      </th>
                  </tr>
              </thead>
              <tbody>
              @foreach($data as $key => $sales)
                  <tr>
                      <td>
                          {{ ($data->currentpage()-1) * $data->perpage() + $key + 1 }}
                      </td>
                      <td>
                        {{$sales->customer->car_reg_no}}
                      </td>
                      <td>
                        {{$sales->service->name}}
                      </td>
                      <td>
                      {{$sales->washer}}
                      </td>
                      <td>
                        {{$sales->date}}
                      </td>
                      <td>
                        {{$sales->total}}
                      </td>
                  </tr>
              @endforeach
              @if($data->currentpage() == $data->lastpage())
                  <tr>
                      <td></td>
                      <td><strong>Grand Total</strong></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><strong>₦{{$grandTotal}}</strong></td>
                  </tr>
              @endif
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
        <div>
            {{$data->links()}}
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
