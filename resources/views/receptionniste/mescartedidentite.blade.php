@extends('receptionniste.indexrecep')

@section( 'contenues')

<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Demander
</button> --}}

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Demande Carte d'identité</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h6>Veuillez fournir une copie de piece ou un extrait!</h6>

              <form action="{{ route('onlyrecpdemandeci') }}" enctype="multipart/form-data" method="POST">
                @csrf

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example1q">Objet</label>
                  <textarea id="form3Example1q" class="form-control" name="objet" cols="30" rows="3"></textarea>
                </div>
                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example1q">Anncienne piece ou extrait</label>
                  <input type="file" id="form3Example1q" class="form-control" name="document">
                </div>
                

                {{-- <div class="row">
                    {{-- <div class="form-outline mb-4">
                      <label class="form-label" for="form3Example1q">Type de demande</label>
                      <input type="text" id="form3Example1q" class="form-control" name="type">
                    </div> --}}
                  <div class="col mb-4">
                    

                  </div>
                  
                </div> 

                

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

	<!-- tabs card start -->
  <div class="col-sm-12 mt-3">
    <div class="card tabs-card">
        <div class="card-block p-0">
            <!-- Nav tabs -->
            
            <ul class="nav nav-tabs md-tabs" role="tablist">
                <li class="nav-item">                    
                    <a class="nav-link active " data-toggle="tab" href="#home3" role="tab" ><i class="fa fa-home"></i>La liste de mes demandes </a>                                                
                    <div class="slide"></div>
                </li>
                
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#" role="tab"><i class="fa fa-key"></i>Les demandes validées</a>
                        <div class="slide"></div>
                    </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#" role="tab"><i class="fa fa-play-circle"></i>Les demandes rejetées</a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" style="background-color:blue" data-toggle="tab" href="#" role="tab" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-database"></i>Nouvelle Demande</a>
                    <div class="slide"></div>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content card-block">
                <div class="tab-pane active" id="home3" role="tabpanel">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <h5>{{$ayira->count()}}</h5>
                            <tr>
                                <th>#Id</th>
                                <th>No Demande</th>
                                <th>Date Demande</th>
                                <th>Status</th>
                                <th>Document envoyé</th>
                                <th>Actions</th>
                                
                                
                            </tr>
                            @if ($ayira->count()>0)
                                
                            @foreach ($ayira as $cissan )
                                 
                            <tr>
                                <td>{{ $cissan->id }}</td>
                                <td>CI2022</td>
                                <td>{{ ($cissan->created_at) }}</td>
                                <td>{{ ($cissan->status) }}</td>


                                <td><a href="{{ url('carte/d_identite/'.$cissan->document) }}" download>Fichier</a></td>
                                             
                                <td>
                                    <a href="{{ url('carte/d_identite/'.$cissan->document) }}" view class="btn btn-sm label btn-primary">Voir</a>
                                
                                                               
                                </td>
                                
                            </tr>
                            @endforeach
                            @endif
                        </table>
                    </div>
                    {{-- <div class="text-center">
                        <button class="btn btn-outline-primary btn-round btn-sm">Plus</button>
                    </div> --}}
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

