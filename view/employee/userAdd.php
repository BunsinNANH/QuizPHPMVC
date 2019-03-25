<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center ">Add User</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="index.php?action=addUserInfo">
                        <div class="form-group">
                            <div class="form-group">
                                <input type="text" required class="form-control" id="username" name="username" placeholder="Username" />
                            </div>
                            <div class="form-group">
                                <input type="text" required class="form-control" id="name" name="name" placeholder="Full Name" />
                            </div>
                            <div class="form-group">
                                <input type="password" required class="form-control" id="pwd" name="pwd" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Submit" name="btn-save" id="btn-save" class="btn btn-success"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
