@extends('layouts.app')

@section('content')
   <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 mt-5">
                <div class="card shadow">
                    <form action="{{ url('/register') }}" method="post">
                        @csrf       
                        <div class="card-header bg-light">
                            <div class="login-logo">
                                <a href="../../index2.html"><b>Biblioteca</b> - regístrate</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" class="form-control" id="inputEmail4">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="inputPassword4">Password</label>
                                    <input type="password" class="form-control" id="inputPassword4">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputAddress">Address</label>
                                  <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                                </div>
                                <div class="form-group">
                                  <label for="inputAddress2">Address 2</label>
                                  <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="inputCity">City</label>
                                    <input type="text" class="form-control" id="inputCity">
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label for="inputState">State</label>
                                    <select id="inputState" class="form-control">
                                      <option selected>Choose...</option>
                                      <option>...</option>
                                    </select>
                                  </div>
                                  <div class="form-group col-md-2">
                                    <label for="inputZip">Zip</label>
                                    <input type="text" class="form-control" id="inputZip">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                      Check me out
                                    </label>
                                  </div>
                                </div>
                               
                              </form>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Sign in</button>
                        </div>
                     </form>
                </div>
            </div>
        </div>
   </div>
@endsection