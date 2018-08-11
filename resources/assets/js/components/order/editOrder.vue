<template>
	<div id="page-wrapper">
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-lg-12">
	                <h1 class="page-header">Order
	                    <small>Edit</small>
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
	                <form @submit.prevent="editOrder">
	                    <div class="form-group">
	                        <label>ID</label>
	                        <input class="form-control" name="id" v-model="order.id" disabled />
	                    </div>
	                    <div class="form-group">
	                        <label>Email</label>
	                        <input class="form-control" name="email" v-model="order.user.email" disabled />
	                    </div>
	                    <div class="form-group">
	                        <label>Username</label>
	                        <input class="form-control" name="username" v-model="order.user.name" disabled />
	                    </div>
	                    <div class="form-group">
	                        <label>Total Money</label>
	                        <input class="form-control" name="totalMoney" v-model="order.total_money" disabled />
	                    </div>
	                    <div class="form-group">
	                        <label>Status</label>
	                        <select class="form-control" name="status" v-model="order.status">
                                <option v-for="st in status" :value="st">{{st}}</option>
                            </select>
	                    </div>
	                    <button type="submit" class="btn btn-default">Order Edit</button>
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
				order: {},
				errors: [],
				result: '',
				status: ['Completed', 'Waiting', 'Cancelled']
			}
		},
		created() {
			var id = this.$route.params.id
			axios.get('admin/order/edit/' + id).then(response => {
				this.order = response.data
			}).catch(errors => {
				console.log(errors)
			})
		},
		methods:{
			editOrder() {
				axios.post("admin/order/update/" + this.order.id, {
					'status': this.order.status
				}).then(response => {
					this.errors = []
					this.result = ''
					if (response.data.result) {
						this.result = response.data.result
					} else {
						if (response.data.errors) {
							this.errors = response.data.errors
						}
					}
				}).catch (errors => {
					console.log(errors)
				})
			}
		}
	}
</script>