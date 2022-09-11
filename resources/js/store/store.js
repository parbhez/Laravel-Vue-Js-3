export default {
    state: {
        postDataArr: []
    },
    getters: {
        getPostData(state) {
            return state.postDataArr;
        }
    },
    actions: {
        async getAllPost(data, page = 1, ) {
            this.isLoading = true;
            await axios
                .get(
                    base_url +
                    "post/post/list?page=" +
                    page
                )
                .then((response) => {
                    console.log(response.data.post);
                    this.isLoading = false;
                    data.commit('posts', response.data.post);
                })
                .catch((error) => {
                    console.log(error);
                });
        }
    },
    mutations: {
        posts(state, data2) {
            state.postDataArr = data2;
        }
    },
};