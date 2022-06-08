@extends('layouts.login-layout')

@section('content')

<section class="vh-100 d-flex bg-light">
    <div class="container h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="card">
            <div class="row g-0">
              <div class="col-md-6 d-block m-auto">
                <img src="/img/login.jpg" class="img-fluid rounded-start" alt="Sample image">
              </div>
              <div class="col-md-6">
                <div class="card-body text-center">
                  <img src="/img/logoVerticalDark.png" class="img-fluid" alt="Logótipo SolarEnergy">
                </div>

                <div class="card-body">
                  <h4 class="text-center mb-4">Iniciar Sessão</h4>
                    <form>
            
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                        <input type="email" id="inputEmail" class="form-control form-control-md"
                            placeholder="Email" />
                        </div>
            
                        <!-- Password input -->
                        <div class="form-outline mb-3">
                        <input type="password" id="inputPassword" class="form-control form-control-md"
                            placeholder="Palavra-passe" />
                        </div>
            
                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                <label class="form-check-label" for="form2Example3">
                                Relembrar
                                </label>
                            </div>
                        </div>
            
                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="button" class="btn btn-md btn-greencolor text-light"
                                style="padding-left: 2.5rem; padding-right: 2.5rem; width: 100%">Entrar</button>
                            <p class="small mt-2 pt-1 mb-0">Não tem uma conta? 
                                <a href="/registo" class="link-danger">Registar-se</a>
                            </p>
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