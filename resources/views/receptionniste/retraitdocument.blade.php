@extends('receptionniste.indexrecep')

@section( 'contenues')

<div class="col-sm-12 mt-3">
    <div class="card tabs-card">
        <div class="card-block p-0">
            <!-- Nav tabs -->
            {{-- <ul class="nav nav-tabs md-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home3" role="tab"><i class="fa fa-home"></i>La liste des demandes</a>
                    <div class="slide"></div>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#" role="tab"><i class="fa fa-key"></i></a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#" role="tab"><i class="fa fa-play-circle"></i></a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" style="background-color:blue" data-toggle="tab" href="#" role="tab"data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="fa fa-database"></i>Nouvelle Demande</a>
                    <div class="slide"></div>
                </li>
            </ul> --}}
            <!-- Tab panes -->
            <div class="tab-content card-block">
                <div class="tab-pane active" id="home3" role="tabpanel">
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
                
                    <marquee behavior="" direction="">
                        <h6 class="text-danger">Si vous rejetter la demande veuillez s'il vous changer le status en Rejetter et mentionnez le motif du rejet</h6>
                    </marquee>  
                    

                    <form action="" class="px-md-2" method="POST">
                        @csrf
                        @method('PATCH')
                            {{-- Try --}} 
                            
                            <div class="row">
                                <div class="col mb-4">
                                  <div class="form-outline datepicker">
                                    <label for="exampleDatepicker1" class="form-label">Numero de la demande</label>
                                    <input type="text" class="form-control" id="exampleDatepicker1" name="adresse" readonly value="{{ $prendre->id }}"/>
                                  </div>
              
                                </div>
                                <div class="col-md mb-4">
                                  <label for="exampleDatepicker1" class="form-label">Date du Rendez Vous</label>
                                  <input type="text" class="form-control" id="exampleDatepicker1" name="phone" readonly value="{{ $prendre->daterdv }}"/>
                                </div>
                            </div>  
                            
                            <div class="row">
                                <div class="col mb-4">
                                  <div class="form-outline datepicker">
                                    <label for="exampleDatepicker1" class="form-label">Date de Retrait</label>
                                    <input type="datetime-local" class="form-control" id="exampleDatepicker1" name="date_retrait" />
                                  </div>
              
                                </div>
                                <div class="col-md mb-4">
                                  <label for="exampleDatepicker1" class="form-label">Montant</label>
                                  <input type="text" class="form-control" id="exampleDatepicker1" name="prix" />
                                </div>
                            </div>     
                        
                        <div class="form-outline mb-4">
                            <label class="form-label fw-bold" for="form3Example1q">Numero du document retiré</label>
                            <input type="text" class="form-control" id="exampleDatepicker1" name="numero_document" />
                            {{-- <textarea name="motifrejet" class="form-control" id="" cols="30" rows="5"></textarea> --}}
                        </div>
                          
                        <div class="modal-footer">  
                            <button type="button" class="btn text-white" style="background-color:#B66639" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn text-white" style="background-color:#0972a1">Valider</button>
                        </div>                     
                      </form>
                    
                </div>

            </div>
        </div>
    </div>
</div>

   
<script>
    query().marquee({
    anim: "scroll", duration: 1, life: 2.5,
    messages: [...]
})
</script>
@endsection