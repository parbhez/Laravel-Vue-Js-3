<template>
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>All Posts</h4>
                </div>

                <vue-snotify></vue-snotify>
                <preloader-component></preloader-component>

                <div class="card-body">
                    <div class="float-left" style="margin-right: 10px">
                        <!-- <select class="form-control selectric"> -->
                        <select class="form-control">
                            <option selected disabled value="">
                                Action For Selected
                            </option>
                            <option>Move to Draft</option>
                            <option>Move to Pending</option>
                            <option>Delete Pemanently</option>
                        </select>
                        &nbsp;
                    </div>

                    <div class="float-left" style="margin-right: 10px">
                        <!-- <select class="form-control selectric"> -->
                        <select class="form-control">
                            <option value="" disabled selected>
                                Select Category
                            </option>
                            <option>News</option>
                            <option>International</option>
                            <option>National</option>
                        </select>
                    </div>
                    &nbsp;

                    <div class="float-left" style="margin-right: 10px">
                        <!-- <select class="form-control selectric"> -->
                        <select class="form-control">
                            <option value="" disabled selected>
                                Select Sub Category
                            </option>
                            <option>Sub News</option>
                            <option>Sub International</option>
                            <option>Sub National</option>
                        </select>
                    </div>
                    &nbsp;

                    <div class="float-left">
                        <div class="input-group">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Search By Title"
                                v-model="keyword"
                                @keyup="getkeyupPost()"
                            />
                            <div class="input-group-append">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="float-left">
                        <div class="input-group-append">
                            &nbsp;&nbsp;
                            <button
                                @click="clearFilter()"
                                class="btn btn-primary btn-lg"
                            >
                                Clear Filter
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="float-left">
                        <label> Show &nbsp; </label>
                    </div>
                    <div class="float-left">
                        <select
                            v-model="limit"
                            class="form-control form-control-sm"
                        >
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="500">500</option>
                        </select>
                    </div>

                    <div class="float-left">
                        <label>&nbsp; entries &nbsp;</label>
                    </div>

                    <div class="float-right">
                        <form>
                            <div class="input-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Search By Title"
                                    v-model="keyword"
                                    @keyup="getkeyupPost()"
                                />
                                <div class="input-group-append">
                                    <button class="btn btn-primary btn-sm">
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
                                <th>Tag</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Created At</th>
                                <th>Status</th>
                            </tr>

                            <tbody v-if="posts">
                                <tr
                                    v-for="(value, index) in posts.data"
                                    :key="index"
                                >
                                    <td>
                                        <div
                                            class="custom-checkbox custom-control"
                                        >
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
                                    <td>{{ value.id }}</td>
                                    <td>
                                        {{ value.title }}
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
                                    <td>{{ value.tag }}</td>
                                    <td>
                                        <a href="#">{{
                                            value.category.category_name
                                        }}</a
                                        >,
                                        <a href="#">Tutorial</a>
                                    </td>
                                    <td>
                                        <a href="#">
                                            <img
                                                alt="image"
                                                :src="
                                                    '/images/post/' +
                                                    value.thumbnail
                                                "
                                                class="rounded-circle"
                                                width="35"
                                                data-toggle="title"
                                                title=""
                                            />
                                            <div class="d-inline-block ml-1">
                                                Masud
                                            </div>
                                        </a>
                                    </td>
                                    <td>10.20.10</td>
                                    <td>
                                        <div class="badge badge-primary">
                                            Published
                                        </div>
                                    </td>
                                </tr>
                            </tbody>

                            <tbody v-if="!posts">
                                <tr>
                                    <td>Data not found</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <pagination-component
                        v-if="posts"
                        :pageData="posts"
                    ></pagination-component>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isLoading: false,
            keyword: "",
            url: base_url,
            limit: 10,
            page: 1,
        };
    },

    mounted() {
        this.$store.dispatch("getAllPost", [this.page, this.limit]);
    },

    watch: {
        limit(newLimit, oldLimit) {
            if (newLimit) {
                this.showToggle;
                this.$store.dispatch("getAllPost", [this.page, newLimit]);
            }
        },
    },

    computed: {
        posts() {
            return this.$store.getters.getPostData;
            //return this.$store.state.postDataArr;
        },
    },

    methods: {},
};
</script>
