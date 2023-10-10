<template>

    <div>
        <div class="d-flex justify-content-between align-content-center mb-2">
            <div class="d-flex ">
                <div >
                    <div class="d-flex align-items-center ml-4">
                        <label for="paginate" class="text-nowrap mr-2 mb-0"
                        >Per Page</label
                        >
                        <select v-model="paginate" class="form-control form-control-sm">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                </div>


                <div>

                    <div class="dropdown ml-4">
                        <button
                            class="btn btn-secondary dropdown-toggle"
                            data-bs-toggle="dropdown"
                        >
                            With Checked (1)
                        </button>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item" type="button">
                                Delete
                            </a>
                            <a class="dropdown-item" type="button">
                                Export
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <input
                    type="search"
                    class="form-control"
                    placeholder="Search by name,email,phone,or address..."
                />
            </div>
        </div>

        <div class="col-md-10 mb-2">
            <div>
                You are currently selecting all
                <strong>10</strong> items.
            </div>
            <div>
                You have selected <strong>10</strong> items, Do you want to
                Select All <strong>25</strong>?
                <a href="" class="ml-2">Select All</a>
            </div>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <tbody>
                <tr>
                    <th><input type="checkbox"/></th>
                    <th>
                        ID
                    </th>
                    <th>
                        Title
                    </th>
                    <th>
                        Slug
                    </th>
                    <th>
                        Content
                    </th>
                    <th>
                        Published
                    </th>
                    <th>
                        Category id
                    </th>
                    <th>Created at</th>

                    <th>Action</th>
                </tr>

                                <tr v-for="post in posts.data" :key="post.id">
                                    <td>
                                        <input type="checkbox" />
                                    </td>
                                    <td>{{ post.id }}</td>
                                    <td>{{ post.title }}</td>
                                    <td>{{ post.slug }}</td>
                                    <td>{{ post.content }}</td>
                                    <td>{{ post.published }}</td>
                                    <td>{{ post.category_id }}</td>
                                    <td>{{ post.created_at }}</td>
                                    <td>
                                        <button @click="test()" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                </tbody>
            </table>
        </div>
        <div class="row mt-4">
            <div class="col-sm-6 offset-5">
<!--                <pagination :data="posts" @pagination-change-page="getPosts"></pagination>-->
                <pagination></pagination>
            </div>
        </div>
    </div>

</template>

<script>
export default {

    data() {
        return {
            posts: {},
            paginate: 10,
        }
    },
    watch:{
        paginate: function(value){
            this.getPosts();
        }
    },
    methods: {
        getPosts(page = 1){
            axios.get('api/posts?page=' + page + '&paginate=' + this.paginate)
                .then(response => {
                    this.posts = response.data;
                })
        }
    },
    mounted(){
       this.getPosts();
    }


}
</script>
