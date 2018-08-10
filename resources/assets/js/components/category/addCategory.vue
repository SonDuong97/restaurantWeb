<template>
	<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category
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
                    <form @submit.prevent="addCategory">
                        <div class="form-group">
                            <label>Category Name</label>
                            <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" v-model="categoryName"/>
                        </div>
                        <button type="submit" class="btn btn-default">Category Add</button>
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
				categoryName: '',
				errors: [],
				result: ''
			}
		},
		methods: {
			addCategory() {
				axios.post('admin/category/addCate', {txtCateName: this.categoryName}).then(response => {
					this.errors = []
					this.result = ''
					if (response.data.result) {
						this.result = response.data.result
					} else {
						if (response.data.errors.txtCateName) {
							this.errors.push(response.data.errors.txtCateName)
						}
					}
				})
			}
		}
	}
</script>