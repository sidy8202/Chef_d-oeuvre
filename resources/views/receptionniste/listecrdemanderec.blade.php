@extends('receptionniste.indexrecep')

@section( 'contenues')


  {{-- Modal confirmation de Rendez vous --}}

<div class="modal fade" id="confModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Fixer un Rendez vous avec le citoyen</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body"> 
                <form action="{{ route('confirmdemandecr') }}" enctype="multipart/form-data" method="POST">
                  @csrf
                  <input type="" id="id" name="id_demandescer">
                    
                  {{-- <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1q">Type de demande</label>
                    <input type="text" id="form3Example1q" class="form-control" name="type">
                  </div> --}}
                  <div class="form-outline mb-4">
                      <label class="form-label" for="form3Example1q">Date du Rendez vous </label>
                      <input type="datetime-local" id="form3Example1q" class="form-control" name="daterdv">
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1q">Message </label>
                    <textarea name="commentaires" id="form3Example1q" class="form-control" cols="30" rows="3"></textarea>
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

{{-- Fin du modal confirm --}}
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Demande Certificat de residence</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                  <h6>Veuillez fournir la pièce de votre logeur</h6>
                <form action="{{ route('listecerdemandes') }}" enctype="multipart/form-data" method="POST">
                      @csrf
  
                  <div class="form-outline mb-4">
                      <label class="form-label" for="form3Example1q">Objet</label>
                      <textarea name="objet" id="form3Example1q" class="form-control" cols="30" rows="3"></textarea>
                      {{-- <input type="text" id="form3Example1q" class="form-control" name="objet"> --}}
                    </div>
  
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1q">Piece du logeur</label>
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
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                      <button type="submit" class="btn btn-primary">Envoyer</button>
                    </div>
  
                </form>    
                
        </div>
                    
                  
      </div>
    </div>
  </div>
  {{-- Fin demande --}}
  
  {{-- Debut rejet --}}

       <div class="modal fade" id="rejetModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Formulaire de rejet</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                  <h6>Veuillez s'il vous plait mentionner le motif du rejet de la demande</h6>
                <form action="" id="rejetform" enctype="multipart/form-data" method="POST">
                      @csrf

                  <div class="form-outline mb-4">
                        <label class="form-label" name="motif" id= for="form3Example1q">Motif du Rejet</label>
                        <textarea name="motifrejet"  id="motifrejet" class="form-control" cols="30" rows="3"></textarea>
                        {{-- <input type="text" id="form3Example1q" class="form-control" name="objet"> --}}
                  </div>

                  <div class="form-outline mb-4">
                      <label class="form-label" for="form3Example1q">Objet</label>
                      <textarea name="objet" id="objet" class="form-control" cols="30" rows="3"></textarea>
                      {{-- <input type="text" id="form3Example1q" class="form-control" name="objet"> --}}
                  </div>
  
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1q">Piece du logeur</label>
                    <input type="file" id="" class="form-control" name="document">
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

  {{-- Fin rejet --}}
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
                      <a class="nav-link active" data-toggle="tab" href="#home3" role="tab"><i class="fa fa-home"></i>La liste des demandes</a>
                      <div class="slide"></div>
                  </li>
                  
                  <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#profile3" role="tab"><i class="fa fa-key"></i>Les demandes validées</i></a>
                      <div class="slide"></div>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#message3" role="tab"><i class="fa fa-play-circle"></i>Les demandes rejetées</a>
                      <div class="slide"></div>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-white" style="background-color:blue" data-toggle="tab" href="#" role="tab"data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="fa fa-database"></i>Nouvelle Demande</a>
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
                                  <th>Demandeur</th>
                                  <th>Status</th>
                                  <th>FIchier Envoyé</th>
                                  <th>Actions</th> 
                              </tr>
                                   
                                @foreach ($cert as $cool )
                             
                              <tr>
                                  {{-- <td><img src="assets/images/product/prod2.jpg" alt="prod img" class="img-fluid"></td> --}}
                                  <td>{{ $cool->id }}</td>
                                  <td>{{ $cool->created_at }}</td>
                                  <td>{{ $cool->user->nom }}  {{ $cool->user->prenom }}</td>

                                  <td>{{ $cool->status }}</td>
                                  <td><a href="{{ url('certi/residencee'.$cool->document) }}" download>Fichier</a></td>
                                  <td>
                                    <a href="{{ url('certi/residencee'.$cool->document) }}"  class="label btn-primary btn-sm" view >Voir</a>
                                    {{-- <a href="#" class="label label-success btn-sm" data-id="{{ $cool->id }}" id="conf">Valider</a> --}}
                                    <a href="{{ route('certerevalider', $cool->id) }}" class="label label-danger rejet btn-sm ">rejetter</a>
                                    <a href="{{ route('certerejet', $cool->id) }}" id="rejet" class="label label-danger rejet btn-sm ">rejetter</a>
                                </td>                                  
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
                          <table class="table">
                              <tr>
                                <th>No Demande</th>
                                <th>Date Demande</th>
                                <th>Demandeur</th>
                                <th>Status</th>
                                <th>FIchier Envoyé</th>
                                <th>Actions</th> 
                              </tr>
                              @foreach($gnouman as $propre)
                              <tr>
                                  <td>{{ $propre->id }}</td>
                                  <td>{{ $propre->created_at }}</td>
                                  <td>{{ $propre->user->nom }}  {{ $propre->user->prenom }}</td>
                                  <td>{{ $propre->status }}</td>
                                  <td><a href="{{ url('certi/residencee'.$propre->document) }}" download>Fichier</a></td>
                                  <td>
                                    <a href="#" class="label label-success btn-sm" data-id="{{ $propre->id }}" id="conf">Valider</a>
                                  </td>
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
                                <th>No Demande</th>
                                <th>Date Demande</th>
                                <th>Demandeur</th>
                                <th>Status</th>
                                <th>FIchier Envoyé</th>
                              </tr>
                              <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
  

<script>
    $(document).ready( function () {
        $('.datatable').DataTable();
    } );
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>


<script>
    $(document).on('click','#conf', function (){ 

// alert('Hello');
var id = $(this).attr('data-id')
$('#id').val(id);

$('#confModal').modal('show');
});
</script>

@endsection


@section('scripts')
  <script type="text/javascript">

    // var id_vols = $(this).val();
    // alert(id) #editModal;
    
    $(document).ready(function() {
    
    var table = $('#datatable').DataTable();
    
    
    table.on('click','.rejet', function() {
    
    
        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')){
            $tr = $tr.prev('.parent');
        }
        var data = table.row($tr).data();
        console.log(data);
        $('#type').val(data[1]);
        $('#status').val(data[2]);
        $('#objet').val(data[3]);
        $('#motifrejet').val(data[4]);
        $('#rejetform').attr('action', '/vol/'+data[0]);
        $('#rejetModal').modal('show');
    });
  });
    
@endsection