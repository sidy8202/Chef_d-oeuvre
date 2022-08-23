@extends('admin.indexadmin')

@section( 'contenues')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Demander
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Demande Certificat de residence</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

              <form action="{{URL('/demandes') }}" method="POST">

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example1q">Piece du logeur</label>
                  <input type="file" id="form3Example1q" class="form-control" name="apiece">
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example1q">Votre piece</label>
                  <input type="file" id="form3Example1q" class="form-control" name="extrait">
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1q">Une facture d'eclectricité recente</label>
                    <input type="file" id="form3Example1q" class="form-control" name="extrait">
                  </div>

                <div class="form-outline mb-4">
                  <input type="hidden" value="carte_didentite" name="type">
                  <input type="" id="form3Example1q" class="form-control">
                </div>


                {{-- <div class="row">
                  <div class="col mb-4">
                    <div class="form-outline datepicker">
                      <label for="exampleDatepicker1" class="form-label">Copie d'extrait </label>
                      <input type="file" class="form-control" id="exampleDatepicker1" name="adresse"/>
                    </div>

                  </div>
                  <div class="col-md mb-4">
                    <label for="exampleDatepicker1" class="form-label">Attestation ou diplome</label>
                    <input type="file" class="form-control" id="exampleDatepicker1" name="phone"/>
                  </div>
                </div> --}}

                

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                  </div>

              </form>    
              
      </div>
                  
                
    </div>
  </div>
</div>
    @if(count($errors) > 0)
    <div class=" alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>    

            @endforeach
        </ul>
    </div>
    @endif

    @if (session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div> 
    @endif
    @if(count($errors) > 0)
<div class=" alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>    

        @endforeach
    </ul>
</div>
@endif

@if (session('success'))
<div class="alert alert-success">
    <p>{{ session('success') }}</p>
</div> 
@endif
        <!-- tabs card start -->
  <div class="col-sm-12 mt-3">
    <div class="card tabs-card">
        <div class="card-block p-0">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs md-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home3" role="tab"><i class="fa fa-home"></i>Home</a>
                    <div class="slide"></div>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#profile3" role="tab"><i class="fa fa-key"></i>Security</a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#messages3" role="tab"><i class="fa fa-play-circle"></i>Entertainment</a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#settings3" role="tab"><i class="fa fa-database"></i>Big Data</a>
                    <div class="slide"></div>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content card-block">
                <div class="tab-pane active" id="home3" role="tabpanel">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>No Demande</th>
                                <th>Date Demande</th>
                                <th>Demandeur</th>
                                <th>Status</th>
                                <th>Actions</th>
                                
                            </tr>
                            <tr>
                                <td><img src="assets/images/product/prod2.jpg" alt="prod img" class="img-fluid"></td>
                                <td>PNG002344</td>
                                <td>John Deo</td>
                                <td><span class="label label-warning">En cours</span></td>              
                                <td>
                                  <span class="label label-success">Valider</span>
                                  <span class="label label-danger">rejetter</span>                              
                                </td>
                                
                            </tr>
                          
                        </table>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-outline-primary btn-round btn-sm">Load More</button>
                    </div>
                </div>
                <div class="tab-pane" id="profile3" role="tabpanel">

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Image</th>
                                <th>Product Code</th>
                                <th>Customer</th>
                                <th>Purchased On</th>
                                <th>Status</th>
                                <th>Transaction ID</th>
                            </tr>
                            <tr>
                                <td><img src="assets/images/product/prod3.jpg" alt="prod img" class="img-fluid"></td>
                                <td>PNG002653</td>
                                <td>Eugine Turner</td>
                                <td>04-01-2017</td>
                                <td><span class="label label-success">Delivered</span></td>
                                <td>#7234417</td>
                            </tr>
                            <tr>
                                <td><img src="assets/images/product/prod4.jpg" alt="prod img" class="img-fluid"></td>
                                <td>PNG002156</td>
                                <td>Jacqueline Howell</td>
                                <td>03-01-2017</td>
                                <td><span class="label label-warning">Pending</span></td>
                                <td>#7234454</td>
                            </tr>
                        </table>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-outline-primary btn-round btn-sm">Load More</button>
                    </div>
                </div>
                <div class="tab-pane" id="messages3" role="tabpanel">

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Image</th>
                                <th>Product Code</th>
                                <th>Customer</th>
                                <th>Purchased On</th>
                                <th>Status</th>
                                <th>Transaction ID</th>
                            </tr>
                            <tr>
                                <td><img src="assets/images/product/prod1.jpg" alt="prod img" class="img-fluid"></td>
                                <td>PNG002413</td>
                                <td>Jane Elliott</td>
                                <td>06-01-2017</td>
                                <td><span class="label label-primary">Shipping</span></td>
                                <td>#7234421</td>
                            </tr>
                            <tr>
                                <td><img src="assets/images/product/prod4.jpg" alt="prod img" class="img-fluid"></td>
                                <td>PNG002156</td>
                                <td>Jacqueline Howell</td>
                                <td>03-01-2017</td>
                                <td><span class="label label-warning">Pending</span></td>
                                <td>#7234454</td>
                            </tr>
                        </table>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-outline-primary btn-round btn-sm">Load More</button>
                    </div>
                </div>
                <div class="tab-pane" id="settings3" role="tabpanel">

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Image</th>
                                <th>Product Code</th>
                                <th>Customer</th>
                                <th>Purchased On</th>
                                <th>Status</th>
                                <th>Transaction ID</th>
                            </tr>
                            <tr>
                                <td><img src="assets/images/product/prod1.jpg" alt="prod img" class="img-fluid"></td>
                                <td>PNG002413</td>
                                <td>Jane Elliott</td>
                                <td>06-01-2017</td>
                                <td><span class="label label-primary">Shipping</span></td>
                                <td>#7234421</td>
                            </tr>
                            <tr>
                                <td><img src="assets/images/product/prod2.jpg" alt="prod img" class="img-fluid"></td>
                                <td>PNG002344</td>
                                <td>John Deo</td>
                                <td>05-01-2017</td>
                                <td><span class="label label-danger">Faild</span></td>
                                <td>#7234486</td>
                            </tr>
                        </table>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-outline-primary btn-round btn-sm">Load More</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- tabs card end -->
@endsection