<template>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">test_text</th>
                        <th scope="col">test_text_area</th>
                        <th scope="col">test_select</th>
                        <th scope="col">radio_option</th>
                        <th scope="col">test_check</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in all_data.data" :key="item.id">
                        <td>{{ item.id }}</td>
                        <td>{{ item.test_text }}</td>
                        <td>{{ item.test_text_area }}</td>
                        <td>{{ item.test_select }}</td>
                        <td>{{ item.radio_option }}</td>
                        <td>{{ item.test_check }}</td>
                        <td>
                            <!-- <button><router-link class="nav-link" :to="'/edit/'+item.id">Show</router-link></button> -->
                            <button><a class="nav-link" :href="'/edit/' + item.id">Edit</a></button>
                            <button @click="handleDelete(item.id)">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
  
<script>

import axios from "axios";
// import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
import { RouterLink } from "vue-router";

export default {
    name: 'ListComponent',
    components: {
        RouterLink
    },

    data() {
        return {
            all_data: [],
        }
    },

    methods: {
        async getData() {
            let url = "http://127.0.0.1:8000/api/create-data/index";
            await axios.get(url, this.formData, (res) => {
                console.log(res);
            })
                .then((res) => {
                    this.all_data = res.data;
                    // const $toast = useToast();
                    // $toast.success('Info Stored!');
                    console.log(res);
                })
                .catch(error => {
                    // const $toast = useToast();
                    console.log(error);
                    // $toast.error("Oops! Something went wrong."+error);
                })
                .finally(() => {

                });
        },

        async handleDelete(id) {
            if (confirm('are you sure!')) {
                let url = "http://127.0.0.1:8000/api/create-data/delete/" + id;
                await axios.post(url, this.formData, (res) => {
                    console.log(res);
                })
                    .then((res) => {
                        this.getData();
                        // console.log(res);
                        // this.all_data = res.data;
                        // const $toast = useToast();
                        // $toast.success('Info Stored!');
                        console.log(res);
                    })
                    .catch(error => {
                        // const $toast = useToast();
                        console.log(error);
                        // $toast.error("Oops! Something went wrong."+error);
                    })
                    .finally(() => {

                    });
            }

        }

    },

    mounted() {
        this.getData();
    },
}
</script>
  
<style></style>
  