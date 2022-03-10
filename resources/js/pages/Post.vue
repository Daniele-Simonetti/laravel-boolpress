<template>
    <div class="container">
        <div class="row mt-3" v-if="post">
            <div class="col-12">
                <div class="card mb-5">
                    <img
                        class="card-img-top"
                        :src="'/storage/' + post.image"
                        :alt="post.title"
                    />
                    <div class="card-body">
                        <h5 class="card-title">{{ post.title }}</h5>
                        <p class="card-text">{{ post.content }}</p>
                        <p class="card-text">
                            <small class="text-muted"
                                >Last updated {{ post.updated_at }}</small
                            >
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Axios from "axios";

export default {
    name: "Post",
    props: ["id"],
    data() {
        return {
            post: null,
        };
    },
    created() {
        const url = 'http://127.0.0.1:8000/api/posts/' + this.id;
        this.getPost(url);
    },
    methods: {
        getPost(url) {
            console.log(url);
            Axios.get(url).then((result) => {
                this.post = result.data.results.data;
            });
        },
    },
};
</script>

<style></style>
