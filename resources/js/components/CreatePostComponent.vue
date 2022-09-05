<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4> Write Your Post </h4>
                </div>

                <div
                    class="col-12"
                    v-if="validation_error"
                    style="margin-top: 20px"
                >
                    <div class="form-group">
                        <div>
                            <ul>
                                <li
                                    class="text-danger"
                                    v-for="error in validation_error"
                                    :key="error[0]"
                                >
                                    {{ error[0] }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <form @submit.prevent="save()" role="form">
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            <label
                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                >Title</label
                            >
                            <div class="col-sm-12 col-md-7">
                                <input
                                    type="text"
                                    v-model="post.title"
                                    class="form-control"
                                    placeholder="Title"
                                />
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label
                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                >Category</label
                            >
                            <div class="col-sm-12 col-md-7">
                                <select
                                    class="form-control selectric"
                                    v-model="post.category_id"
                                >
                                    <option value="">
                                        Please Chose a Category
                                    </option>
                                    <option
                                        v-for="(category, index) in categories"
                                        :key="index"
                                        :value="category.id"
                                    >
                                        {{ category.category_name }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label
                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                >Content</label
                            >
                            <div class="col-sm-12 col-md-7">
                                <textarea
                                    class="summernote-simple"
                                    v-model="post.content"
                                    placeholder="Post Content"
                                ></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label
                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                >Thumbnail</label
                            >
                            <div class="col-sm-12 col-md-7">
                                <div id="image-preview" class="image-preview">
                                    <img :src="post.image" v-if="post.image" />
                                    <label for="image-upload" id="image-label"
                                        >Choose File</label
                                    >
                                    <input
                                        type="file"
                                        name="image"
                                        id="image-upload"
                                        @change="onImageChange"
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label
                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                >Tags</label
                            >
                            <div class="col-sm-12 col-md-7">
                                <input
                                    type="text"
                                    class="form-control inputtags"
                                    v-model="post.tag"
                                    placeholder="Tag"
                                />
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label
                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                >Status</label
                            >
                            <div class="col-sm-12 col-md-7">
                                <select
                                    class="form-control selectric"
                                    v-model="post.status"
                                >
                                    <option value="Publish">Publish</option>
                                    <option value="Draft">Draft</option>
                                    <option value="Pending">Pending</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label
                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                            ></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary">
                                    {{ button_name }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        categories: {
            type: Array,
            default: []
        }
    },

    mounted() {
        console.log(this.categories)
    },

    data() {
        return {
            post: {
                title: "",
                category_id: "",
                image: "",
                content: "",
                tag: "",
                status: "Pending",
            },

            button_name: "Create Post",
            validation_error: null,
        };
    },

    methods: {
        onImageChange(e) {
            let files = e.target.files || e.dataTransfer.files;
            if (!files.length) return;
            this.createImage(files[0]);
        },
        createImage(file) {
            let reader = new FileReader();
            let vm = this;
            reader.onload = (e) => {
                vm.category.image = e.target.result;
            };
            reader.readAsDataURL(file);
        },

        save() {
            this.button_name = "Post Saving...";

            axios
                .post(base_url + "post/post-create", this.post)
                .then((response) => {
                    console.log(response.data);
                    return false;
                    if (response.data.status === "success") {
                        this.resetForm();
                        this.successMessage(response.data);
                        EventBus.$emit("category-created");

                        this.button_name = "Save";
                    } else {
                        this.successMessage(response.data);
                        this.button_name = "Save";
                    }
                })
                .catch((err) => {
                    if (err.response.status == 422) {
                        this.validation_error = err.response.data.errors;

                        this.validationError();

                        this.button_name = "Save";
                    } else {
                        this.successMessage(err);

                        this.isloading = false;

                        this.button_name = "Save";
                    }
                });
        },

        resetForm() {
            this.post = {
                title: "",
                category_id: "",
                image: "",
                content: "",
                tag: "",
                status: "Pending",
            };

            this.validation_error = null;
        },
    },
};
</script>
