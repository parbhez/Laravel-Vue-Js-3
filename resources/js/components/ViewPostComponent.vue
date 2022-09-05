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
                  placeholder="Search By Title"
                  v-model="keyword"
                  @keyup="getPost()"
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
                    <label for="checkbox-all" class="custom-control-label"
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

              <tr v-for="(value, index) in posts.data" :key="index">
                <td>
                  <div class="custom-checkbox custom-control">
                    <input
                      type="checkbox"
                      data-checkboxes="mygroup"
                      class="custom-control-input"
                      id="checkbox-2"
                    />
                    <label for="checkbox-2" class="custom-control-label"
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
                    <a href="#" class="text-danger">Trash</a>
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
                      :src="'/assets/img/avatar/' + value.thumbnail"
                      class="rounded-circle"
                      width="35"
                      data-toggle="title"
                      title=""
                    />
                    <div class="d-inline-block ml-1">Masud</div>
                  </a>
                </td>
                <td>10.20.10</td>
                <td>
                  <div class="badge badge-primary">Published</div>
                </td>
              </tr>
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
import PaginationComponent from "./pagination/PaginationComponent.vue";

export default {
  components: {
    "pagination-component": PaginationComponent,
  },

  data() {
    return {
      posts: [],
      isLoading: false,
      keyword: "",
      url: base_url,
    };
  },

  mounted() {
    // this  will not work in eventBus that why
    // we are initializing with _this

    var _this = this;
    _this.getPost();
  },

  methods: {
    async getPost(page = 1) {
      this.isLoading = true;
      await axios
        .get(
          base_url + "post/post-list?page=" + page + "&keyword=" + this.keyword
        )
        .then((response) => {
          //console.log(response.data);
          //return false;
          this.posts = response.data;
          this.isLoading = false;
        })
        .catch((error) => {
          console.log(error);
          this.posts = [];
        });
    },

    pageClicked(pageNo) {
      var vm = this;

      history.pushState(null, null, '?page=' + pageNo);
      vm.getPost(pageNo);
    },
  },
};
</script>
