<template>
	<div id="page-wrapper">
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-lg-12">
	                <h1 class="page-header">Product
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
	            	<div>
	                    <div class="form-group">
	                        <label>Name</label>
	                        <input class="form-control" name="txtName" placeholder="Please Enter The Eating Name" v-model="product.name"/>
	                    </div>
	                    <div class="form-group">
	                        <label>Price</label>
	                        <input class="form-control" name="txtPrice" placeholder="Please Enter The Cost" v-model.number="product.price"/>
	                    </div>
	                    <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="cateId" v-model="product.categoryId">
	                                <option v-for="category in categories" :value="category.id">{{category.categoryName}}</option>
                            </select>
                        </div>
	                    <div class="form-group">
	                        <label>Intro</label>
	                        <textarea class="form-control" rows="3" name="txtIntro" v-model="product.intro"></textarea>
	                    </div>
	                    <button class="btn btn-default" @click="addProduct">Add Product</button>
	                </div>
	            </div>
	        </div>
	        <!-- /.row -->
	    </div>
	    <!-- /.container-fluid -->
	</div>
</template>

<script type="text/javascript">
	export default {
		data: () => {return {
			product: {
				name: '',
				price: '',
				intro: '',
				categoryId: 1
			},
			categories: [],
			errors: [],
			result: ''
		}},
		created() {
			this.getListCategories()
		},
		methods: {
			getListCategories() {
				axios.get('admin/product/add').then(response => {
					this.categories = response.data
				})
			},
			addProduct() {
				axios.post('admin/product/addEating', {
					txtName: this.product.name,
					txtPrice: this.product.price,
					txtIntro: this.product.intro,
					cateId: this.product.categoryId
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
				})
			}
		}
	}
</script>