<template>
	<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 container">
                    <h1 class="page-header">Category
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
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="odd gradeX" align="center" v-for="(category, index) in categories">
                            <td>{{category.id}}</td>
                            <td>{{category.categoryName}}</td>

                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a @click="deleteCategory(category.id, index)"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <router-link :to="{name: 'editCategory', params: {id: category.id}}">Edit</router-link></td>
                        </tr>
                    </tbody>
                </table>
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
				categories: [],
				errors: [],
				result: ''
			}
		},
		created() {
			this.getCategory()
		},
		methods: {
			getCategory() {
				axios.get('admin/category').then(response => {
					this.categories = response.data
				}).catch(error => {
					console.log(error)
				})
			},
			deleteCategory(id, index) {
				if (confirm("Do you really want to delete it?")) {
					axios.delete('admin/category/' + id).then(response => {
						this.errors = []
						this.result = ''
						if (response.data.result) {
							this.result = response.data.result
							this.categories.splice(index, 1)
						} else {
							if (response.data.errors) {
								this.errors.push(response.data.errors)
							}
							
						}
					}).catch(errors => {
						console.log(errors)
					})
				}
			}


		}

	}
</script>