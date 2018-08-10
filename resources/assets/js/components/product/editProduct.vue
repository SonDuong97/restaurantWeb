<template>
	<div id="page-wrapper">
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-lg-12">
	                <h1 class="page-header">Product
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
	            	<form @submit.prevent="editProduct">
	                    <div class="form-group">
	                        <label>Name</label>
	                        <input class="form-control" name="txtName" v-model="product.eatingName" />
	                    </div>
	                    <div class="form-group">
	                        <label>Price</label>
	                        <input class="form-control" name="txtPrice" v-model="product.cost"  />
	                    </div>
	                    <div class="form-group">
	                        <label>Category</label>
	                        <select class="form-control" name="cateId" v-model="product.category_id">
                                <option v-for="category in categories" :value="category.id">{{category.categoryName}}</option>
                            </select>
                        </div>
	                    <div class="form-group">
	                        <label>Intro</label>
	                        <textarea class="form-control" rows="3" name="txtIntro">{{product.description}}</textarea>
	                    </div>
	                    <button type="submit" class="btn btn-default">Product Edit</button>
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
		created() {
			let app = this
			let id = app.$route.params.id
			// alert(id)
			axios.get('admin/product/edit/' + id).then(response => {
				app.product = response.data.eating
				app.categories = response.data.categories
				console.log(app.categories)
			}).catch(error => {
				console.log(error)
			})
		},
		data: () => {
			return {
				product: {
				},
				errors: [],
				categories: [],
				result: ''
			}
		},
		methods: {
			editProduct() {
				axios.post('admin/product/update/' + this.product.id, {
					txtName: this.product.eatingName,
					txtPrice: this.product.cost,
					txtIntro: this.product.description,
					cateId: this.product.category_id
				}).then(response => {
					this.errors = []
					this.result = ''
					if (response.data.result) {
						this.result = response.data.result	
					} else {
						// if(response.data.errors.txtName) {
      //              		this.errors.push(response.data.errors.txtName)
	     //               	}
		   	// 			if(response.data.errors.txtIntro) {
		   	// 				this.errors.push(response.data.errors.txtIntro)
		   	// 			}
		   	// 			if(response.data.errors.txtPrice) {
		   	// 				this.errors.push(response.data.errors.txtPrice)
		   	// 			}
		   				if(response.data.errors) {
		   					this.errors = Object.values(response.data.errors)
		   				}
					}
				}).catch(error => {
					console.log(error)
				})
			}
		}
	}
</script>