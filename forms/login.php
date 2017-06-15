<div id="loginModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
          <!--Modal content-->
          <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
                &times;</span></button>
                  <h4 class="modal-title">Se connecter</h4>
              </div>
              <div class="modal-body">
                  <form action = "connexion.php" method="POST" class="form-horizontal">
                            <!-- Email -->
                            <div class="form-group">
                              <label for="Email" class="col-sm-2 control-label">Email:</label>
                                <div class="col-sm-4 col-sm-push-1">
                                    <input type="email" class="contact-email form-control" id="email_connect" name="email_connect" placeholder="Email" aria-hidden="true" required="">
                                </div>
                            </div>
                            <!-- mot de passe -->
                            <div class="form-group">
                              <label for="motdepasse" class="col-sm-2 control-label">Mot de passe:</label>
                                <div class="col-sm-4 col-sm-push-1">
                                    <input type="password" class="contact-password form-control" id="pwd_connect" name="pwd_connect" placeholder="Mot de passe" required="">
                                </div>
                             </div>
                             <!--mdp oublié et s'enregistrer -->
                            <div class="form-group">
                                <div class="col-sm-6 col-sm-push-3">
                                            <a data-toggle="modal" data-target="#mdpoublieModal"> Mot de passe oublié </a>
                                </div>
                                <!--div class="col-sm-6 col-sm-push-0">
                                            <a data-toggle="modal" data-target="#Registration"> S'enregistrer </a>
                                </div-->
                            </div>
                            <!-- boutton connexion et quitter -->
                            <div class="modal-footer">
                                    <div class=" col-sm-1 col-sm-push-2">
                                        <input type="submit" class="btn btn-primary" name="submit" value ="connexion"/>
                                    </div>
                                    <div class=" col-sm-2 col-sm-push-7">
                                      <button type="button" type="submit" class="btn btn-default btn--sm" data-dismiss="modal">Quitter</button>
                                    </div>
                            </div>

              </form>
              </div>
          </div>
      </div>
  </div>
