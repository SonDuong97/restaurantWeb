<template>
	<div id="page-wrapper">
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-lg-12">
	                <h1 class="page-header">Order
	                    <small>List</small>
	                </h1>
	            </div>
	            <!-- /.col-lg-12 -->
	            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                <thead>
	                    <tr align="center">
	                        <th>ID</th>
	                        <th>Email</th>
	                        <th>Username</th>
	                        <th>Total</th>
	                        <th>Status</th>
	                        <th>Edit</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    <tr class="even gradeC" align="center" v-for="order in orders">
	                        <td>{{order.id}}</td>
	                        <td>{{order.user.email}}</td>
	                        <td>{{order.user.name}}</td>
	                        <td>{{order.total_money}}</td>
	                        <td>{{order.status}}</td>
	                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <router-link :to="{name: 'editOrder', params: {id: order.id}}">Edit</router-link></td>
	                    </tr>
	                </tbody>
	            </table>
	        </div>
	        <!-- /.row -->
	    </div>
	    <!-- /.container-fluid -->
	</div>
</template>

<script>
	export default {
		data: () => {
			return {
				orders: []
			}
		},
		created() {
			this.getOrderList()
		},
		methods: {
			getOrderList() {
				axios.get('admin/order').then(response => {
					this.orders = response.data
				}).catch(errors => {
					console.log(errors)
				})
			}
		}
	}
</script>