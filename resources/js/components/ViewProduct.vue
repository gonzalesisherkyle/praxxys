<template>
    <div class="card">
        <div class="card-header">
            <a href="/api/create" type="button" class="btn btn-success">Create</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <DataTable :data="products" :columns="columns" class="table table-bordered table-striped" :options="{responsive:true,autoWidth:false}" id="table1">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Product Description</th>
                            <th>Date and Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Product Description</th>
                            <th>Date and Time</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </DataTable>
            </div>
        </div>
    </div>
</template>
    
    
<script>
import axios from 'axios';
import DataTable from 'datatables.net-vue3';
import DataTableLib from 'datatables.net-bs5';
import Buttons from 'datatables.net-buttons-bs5'
import ButtonsHtml5 from 'datatables.net-buttons/js/buttons.html5'
import 'datatables.net-responsive-bs5';
DataTable.use(DataTableLib);
DataTable.use(ButtonsHtml5);

export default {
    components: {DataTable},
    data() {
        return {
            products: [],
            columns: [
                {data: 'name'},  
                {data: 'category'},  
                {data: 'description'},  
                {data: 'date_and_time'},  
                {
                    data: 'product_id',
                    render: function (data, type, row) {
                        return `
                            <a href="/api/edit/${row.product_id}"  type="button" class="btn btn-primary" >Edit</a>
                            <a href='/api/delete/${row.product_id}' type="button" class="btn btn-danger">Delete<a/>
                        `;
                    }
                }
            ],
        };
    },
    mounted() {
        this.getProducts();
    },
    methods:{
        getProducts(){
            axios.get('http://localhost:8000/api/view').then(
                response => (
                this.products = response.data
                )
            );
        },
        handleDelete(id) {
            axios.delete(`http://localhost:8000/api/delete/${id}`)
                .then(response => {
                    console.log(`Product  has been deleted.`);
                })
                .catch(error => {
                    console.error(`Error deleting product`, error);
                });
        }
    },
}
</script>
   
<style>
@import 'datatables.net-bs5';
</style>