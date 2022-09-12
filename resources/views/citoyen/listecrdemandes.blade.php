@extends('citoyen.indexcitoi')

@section( 'contenues')

<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Demander
</button> --}}

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#73b4ff">
        <h5 class="modal-title text-white" id="exampleModalLabel" >Demande Certificat de residence</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                <h6>Veuillez fournir la pièce de votre Tuiteur</h6>
              <form action="{{ route('certiblakata') }}" enctype="multipart/form-data" method="POST">
                    @csrf

                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1q">Objet</label>
                    {{-- <input type="text" id="form3Example1q" class="form-control" name="objet"> --}}
                    <textarea id="form3Example1q" class="form-control" name="objet" cols="30" rows="3"></textarea>
                  </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example1q">Piece du Tuiteur</label>
                  <input type="file" id="form3Example1q" class="form-control" name="document">
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color:#B66639">Annuler</button>
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

        <!-- tabs card start -->
  <div class="col-sm-12 mt-3">
    <div class="card tabs-card">
        <div class="card-block p-0">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs md-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home3" role="tab"><i class="fa fa-home"></i>Mes demandes de Certificats</a>
                    <div class="slide"></div>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#profile3" role="tab"><i class="fa fa-key"></i>Demandes Validées</a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#messages3" role="tab"><i class="fa fa-play-circle"></i>Demandes Rejetées</a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" style="background-color:#0972a1" data-toggle="tab" href="#" role="tab"data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="fa fa-database"></i>Nouvelle Demande</a>
                    <div class="slide"></div>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content card-block">
                <div class="tab-pane active" id="home3" role="tabpanel">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="datatable">
                            <tr>
                                <th>No Demande</th>
                                <th>Date Demande</th>
                                <th>Status</th>
                                <th>FIchier Envoyé</th>
                                <th>Actions</th> 
                            </tr>

                            @foreach ($nanaye as $djona )
                                
                            
                            <tr>
                                {{-- <td><img src="assets/images/product/prod2.jpg" alt="prod img" class="img-fluid"></td> --}}
                                <td>CR0{{ $djona->id }}</td>
                                <td>{{ $djona->created_at }}</td>
                                <td>{{ $djona->status }}</td>

                                <td><a href="{{ url('certi/residencee'.$djona->document) }}" download>Fichier</a></td>
                                <td>
                                    {{-- <a href="{{ url('certi/residencee'.$djona->document) }}" class="label btn-primary" view>Voir</span> --}}
                                    <a href="{{ url('certi/residence/'.$djona->document) }}" view class="" title="Afficher" data-toggle="tooltip"><i class="ti-eye"></i></a>&nbsp;&nbsp;&nbsp;        
                                </td>              
                                {{-- <td>
                                  <span class="label label-success">Valider</span>
                                  <span class="label label-danger">rejetter</span>                              
                                </td> --}}                                
                            </tr>
                            @endforeach
                        </table>
                    </div>
                        {{-- <div class="text-center">
                            <button class="btn btn-outline-primary btn-round btn-sm">Load More</button>
                        </div> --}}
                </div>
                <div class="tab-pane" id="profile3" role="tabpanel">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>No Demande</th>
                                <th>Date Demande</th>
                                <th>Status</th>
                                <th>FIchier Envoyé</th>
                                <th>Actions</th> 
                            </tr>
                            @foreach($demandeval as $valider)
                            <tr>
                                <td>CR0{{ $valider->id }}</td>
                                <td>{{ $valider->created_at }}</td>
                                <td>{{ $valider->status }}</td>
                                <td>
                                    <a href="{{ url('certi/residencee'.$valider->document) }}" download>Fichier</a>
                                    
                                </td>
                                <td>
                                    <a href="{{ url('certi/residence/'.$valider->document) }}" view target="_blank" class="" title="Afficher" data-toggle="tooltip"><i class="ti-eye"></i></a>&nbsp;&nbsp;&nbsp;        
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    {{-- <div class="text-center">
                        <button class="btn btn-outline-primary btn-round btn-sm">Load More</button>
                    </div> --}}
                </div>
                <div class="tab-pane" id="messages3" role="tabpanel">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>No Demande</th>
                                <th>Date Demande</th>
                                <th>Status</th>
                                <th>Motif de rejet</th>
                                <th>FIchier Envoyé</th>
                                <th>Actions</th>
                            </tr>
                            @foreach($demanderej as $rejet)
                            <tr>
                                <td>CR0{{ $rejet->id }}</td>
                                <td>{{ $rejet->created_at }}</td>
                                <td>{{ $rejet->status }}</td>
                                <td>{{ $rejet->motifderejet }}</td>
                                <td>
                                    <a href="{{ url('certi/residencee'.$rejet->document) }}" download>Fichier</a>
                                </td>
                                <td>
                                    <a href="{{ url('certi/residence/'.$rejet->document) }}" view class="" title="Afficher" data-toggle="tooltip"><i class="ti-eye"></i></a>&nbsp;&nbsp;&nbsp;                                           
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    {{-- <div class="text-center">
                        <button class="btn btn-outline-primary btn-round btn-sm">Load More</button>
                    </div> --}}
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> 
    
     <script>
        $(document).ready( function () 
        {
            $('#datatable').DataTable();
        } );
    </script>
@endsection