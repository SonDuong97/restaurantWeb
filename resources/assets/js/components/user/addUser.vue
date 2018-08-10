<template>
	<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User
                        <small>Add</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <div class="alert alert-danger" v-if="errors.length">
						<p v-for="error in errors">
							<span v-for="err in error">{{err}}</span>
						</p>
					</div>

            		<div class="alert alert-success" v-if="result !== ''">
            			{{result}}
            		</div>
                    <form @submit.prevent="addUser">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="txtEmail" placeholder="Please Enter Email" v-model="user.email"/>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" name="txtUser" placeholder="Please Enter Username" v-model="user.name" />
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="txtPass" placeholder="Please Enter Password" v-model="user.password"/>
                        </div>
                        <div class="form-group">
                            <label>RePassword</label>
                            <input type="password" class="form-control" name="txtRePass" placeholder="Please Enter RePassword" v-model="user.repassword" />
                        </div>
                        <button type="submit" class="btn btn-default">User Add</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
</template>

<script type="text/javascript">
	export default {
		data: () => {
			return {
				user: {
					name: '',
					email: '',
					password: '',
					repassword: ''
				},
				errors: [],
				result: ''
			}
		},
		methods: {
			addUser() {
				axios.post('admin/user/addAccount', {
					'txtEmail': this.user.email,
					'txtUser': this.user.name,
					'txtPass': this.user.password,
					'txtRePass': this.user.repassword
				}).then(response => {
					this.errors = []
					this.result = ''
					if (response.data.result) {
						this.result = response.data.result
					} else {
						if (response.data.errors) {
							this.errors = Object.values(response.data.errors)
						}
					}
				}).catch(errors => {
					console.log(errors)
				})
			}
		}
	}
</script>