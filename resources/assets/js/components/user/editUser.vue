<template>
	<div id="page-wrapper">
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-lg-12">
	                <h1 class="page-header">User
	                    <small>Edit</small>
	                </h1>
	            </div>
	            <!-- /.col-lg-12 -->
	            <div class="col-lg-7" style="padding-bottom:120px">
	            	<!-- <div class="alert alert-danger" v-if="error !== ''">
                    	{{error}}
                    </div> -->
                    <div class="alert alert-success" v-if="result !== ''">
                        {{result}}
                    </div>
	                <form @submit.prevent="editUser">
	                    <div class="form-group">
	                        <label>Username</label>
	                        <input class="form-control" name="txtUser" v-model="user.name"  />
	                    </div>
	                    <div class="form-group">
	                        <label>Email</label>
	                        <input type="email" class="form-control" name="txtEmail" :value="user.email" disabled/>
	                    </div>
	                    <!-- <div class="form-group">
	                        <label>New Password</label>
	                        <input type="password" class="form-control" name="txtPass" placeholder="Please Enter Password" v-model="newPass" required/>
	                    </div>
	                    <div class="form-group">
	                        <label>ReNewPassword</label>
	                        <input type="password" class="form-control" name="txtRePass" placeholder="Please Enter RePassword" v-model="reNewPass" required/>
	                    </div> -->
	                    <button type="submit" class="btn btn-default">User Edit</button>
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
				user: {},
				result: '',
				newPass: '',
				reNewPass: ''
			}
		},
		created() {
			var id = this.$route.params.id
			axios.get('admin/user/' + id + '/edit').then(response => {
				this.user = response.data
			}). catch(errors => {
				console.log(errors)
			})
		},
		methods: {
			editUser() {
				axios.put('admin/user/' + this.user.id, {
					'txtUser': this.user.name
				}).then(response => {
					this.result = ''
					if (response.data.result) {
						this.result = response.data.result
					}
				}).catch(errors => {
					console.log(errors)
				})
			}
		}
	}
</script>