<template>
	<div id="page-wrapper">
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-lg-12">
	                <h1 class="page-header">Product
	                    <small>List</small>
	                </h1>
	            </div>
	            <!-- /.col-lg-12 -->
	            <div class="col-lg-7">
	                <div class="alert alert-danger container" v-if="errors.length">
						<p v-for="error in errors">
							<span v-for="err in error">{{err}}</span>
						</p>
					</div>

	        		<div class="alert alert-success container" v-if="result !== ''">
	        			{{result}}
	        		</div>
	        	</div>
	            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                <thead>
	                    <tr align="center">
	                        <th>ID</th>
	                        <th>Name</th>
	                        <th>Price</th>
	                        <th>Description</th>
	                        <th>Category</th>
	                        <th>Delete</th>
	                        <th>Edit</th>
	                    </tr>
	                </thead>
	                <tbody>
		                    <tr class="even gradeC" align="center" v-for="(product, index) in products">
		                        <td>{{product.id}}</td>
		                        <td>{{product.eatingName}}</td>
		                        <td>{{product.cost}} USD</td>
		                        <td>{{product.description}}</td>
		                        <td>{{product.category_id}}</td>
		                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a @click="deleteProduct(product.id, index)"> Delete</a></td>
		                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <router-link :to="{name: 'editProduct', params: {id: product.id}}">Edit</router-link></td>
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
		data: () => {return {
			products: [],
			errors: [],
			result: ''
		}},
		created() {
			this.getListProducts()
		},
		methods: {
			getListProducts() {
				axios.get('admin/product/showList').then(response => {
					this.products = response.data
				})
			},
			deleteProduct(id, index) {
				if (confirm("Do you really want to delete it?")) {
					axios.get('admin/product/deleteEating/' + id).then(response => {
						this.errors = []
						this.result = ''
						if (response.data.result) {
							this.result = response.data.result
							this.products.splice(index, 1)
						} else {
							if (response.data.errors) {
								this.errors.push(response.data.errors)
							}
						}
						
					}).catch(error => {
						console.log('Can\'t delete this product' )
					})
				}
			}
		}
	}
</script>