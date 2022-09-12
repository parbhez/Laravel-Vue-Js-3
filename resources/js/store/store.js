export default {
    data() {
        return {
            limit: 10,
            page: 1,
        }
    },
    state: {
        postDataArr: []
    },
    getters: {
        getPostData(state) {
            return state.postDataArr;
        }
    },
    actions: {
        async getAllPost(data, [page, limit]) {
            await axios
                .get(
                    base_url +
                    "post/post/list?page=" +
                    page + "&limit=" + limit
                )
                .then((response) => {
                    //console.log(response.data.post);
                    this.isLoading = true;
                    data.commit('posts', response.data.post);
                })
                .catch((error) => {
                    console.log(error);
                });
            history.pushState(null, null, "?page=" + page + "&limit=" + limit);
        },




    },
    mutations: {
        posts(state, data2) {
            state.postDataArr = data2;
        }
    },
};
