@extends('layouts.login-layout')

@section('content')

<section class="vh-100 d-flex bg-light">
    <div class="container h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">


        <div class="card">
            <div class="row g-0">
              <div class="col-md-6 d-block m-auto">
                <img src="/img/imagem3.jpg" class="img-fluid rounded-start" alt="Sample image">
              </div>
              <div class="col-md-6">

                <div class="card-body text-center">
                  <img src="/img/logoVerticalDark.png" class="img-fluid" alt="Logótipo SolarEnergy">
                </div>

                <div class="card-body">
                  <h3 class="text-center mb-4">Registe-se</h3>
                    <form>
            
                        <!-- Username input -->
                        <div class="form-outline mb-4">
                        <input type="text" id="inputUsername" class="form-control form-control-lg"
                            placeholder="Nome de utilizador" />
                        </div>
                       
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                        <input type="email" id="inputEmail" class="form-control form-control-lg"
                            placeholder="Email" />
                        </div>
            
                        <!-- Password input -->
                        <div class="form-outline mb-3">
                        <input type="password" id="inputPassword" class="form-control form-control-lg"
                            placeholder="Palavra-passe" />
                        </div>
          
                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="button" class="btn btn-lg btn-greencolor text-light py-2"
                                style="padding: 0 2.5rem; width: 100%">Submeter</button>
                        </div>
            
                    </form>
                  
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
    
  </section>
@endsection