<template>
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>All Posts</h4>
                </div>
                <div class="card-body">
                    <div class="float-left">
                        <select class="form-control selectric">
                            <option>Action For Selected</option>
                            <option>Move to Draft</option>
                            <option>Move to Pending</option>
                            <option>Delete Pemanently</option>
                        </select>
                    </div>

                    <div class="float-right">
                        <form>
                            <div class="input-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Search"
                                />
                                <div class="input-group-append">
                                    <button class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="clearfix mb-3"></div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th class="text-center pt-2">
                                    <div
                                        class="custom-checkbox custom-checkbox-table custom-control"
                                    >
                                        <input
                                            type="checkbox"
                                            data-checkboxes="mygroup"
                                            data-checkbox-role="dad"
                                            class="custom-control-input"
                                            id="checkbox-all"
                                        />
                                        <label
                                            for="checkbox-all"
                                            class="custom-control-label"
                                            >&nbsp;</label
                                        >
                                    </div>
                                </th>
                                <th>SL No</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Created At</th>
                                <th>Status</th>
                            </tr>


                            <tr v-for="post in this.posts" :key="post.id">
                                <td>
                                    <div class="custom-checkbox custom-control">
                                        <input
                                            type="checkbox"
                                            data-checkboxes="mygroup"
                                            class="custom-control-input"
                                            id="checkbox-2"
                                        />
                                        <label
                                            for="checkbox-2"
                                            class="custom-control-label"
                                            >&nbsp;</label
                                        >
                                    </div>
                                </td>
                                <td>
                                    {{post.id}}
                                </td>
                                <td>
                                    {{post.title}}
                                    <div class="table-links">
                                        <a href="#">View</a>
                                        <div class="bullet"></div>
                                        <a href="#">Edit</a>
                                        <div class="bullet"></div>
                                        <a href="#" class="text-danger"
                                            >Trash</a
                                        >
                                    </div>
                                </td>
                                <td>
                                    <a href="#">Web Developer</a>,
                                    <a href="#">Tutorial</a>
                                </td>
                                <td>
                                    <a href="#">
                                        <img
                                            alt="image"
                                            src="assets/img/avatar/avatar-5.png"
                                            class="rounded-circle"
                                            width="35"
                                            data-toggle="title"
                                            title=""
                                        />
                                        <div class="d-inline-block ml-1">
                                           {{post.created_by == 1 ? "Masud" : 'Admin'}}
                                        </div>
                                    </a>
                                </td>
                                <td>{{post.created_at}}</td>
                                <td>
                                    <div class="badge badge-primary">
                                        {{post.status == 1 ? "Published" : 'Pending'}}
                                    </div>
                                </td>
                            </tr>


                        </table>
                    </div>
                    <div class="float-right">
                        <nav>
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a
                                        class="page-link"
                                        href="#"
                                        aria-label="Previous"
                                    >
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <a
                                        class="page-link"
                                        href="#"
                                        aria-label="Next"
                                    >
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['posts'],
        mounted(){
            console.log('Component Mounted.')
        }
    }

//     export default{
//       data(){
//          return{
//                products:[]
//              }
//        },
//       created(){
//            this.axios.get('http://localhost:8000/get_post')
//            .then(response => {
//                console.log(response.data);
//                this.products = response.data;
//             })
//             .catch(function(error){
//                 console.log(error)
//             });
//        }

//    }
</script>
