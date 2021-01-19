<template>
 <div>
     <div class="ticket">

         <p class="centered">Payment Receipt
             <br>Address line 1<br>


         <table>
             <thead>
             <tr>
                 <th class="quantity">Q.</th>
                 <th class="description">Description</th>
                 <th class="price">TK</th>
             </tr>
             </thead>
             <tbody>
             <tr v-for="order in orders" :key="order.id">
                 <td class="quantity">{{ order.product_qty }}</td>
                 <td class="description">{{ order.product_name }}</td>
                 <td class="price">{{ order.product_price }}</td>
             </tr>



             <tr>
                 <td class="quantity"></td>
                 <td class="description">Subtotal:</td>
                 <td class="price">{{ subtotals }}</td>
             </tr>

             <tr v-for="vat in vats">
                 <td class="quantity">Vat:</td>
                 <td class="description"></td>
                 <td class="price">{{ vat.vat }}</td>
             </tr>



             <tr v-for="pay in pays">
                 <td class="quantity">paid:</td>
                 <td class="description"></td>
                 <td class="price">{{ pay.pay }}</td>
             </tr>

             <tr v-for="pay in pays">
                 <td class="quantity">Due:</td>
                 <td class="description"></td>
                 <td class="price">{{ pay.due }}</td>
             </tr>
             <tr v-for="pay in pays">
                 <td class="quantity">Paid By:</td>
                 <td class="description"></td>
                 <td class="price">{{ pay.pay_by }}</td>
             </tr>


             <tr v-for="ptotal in ptotals">
                 <td class="quantity"></td>
                 <td class="description">TOTAL</td>
                 <td class="price">{{ ptotal.total }}</td>
             </tr>


             </tbody>
         </table>
         <p class="centered">Thanks for your purchase!
             <br>Created by Riad Khan</p>
     </div>
     <button id="btnPrint" @click="print" class="hidden-print">Print</button>
 </div>
</template>

<script type="text/javascript">
    export default {
        created() {

            this.ordersDetails(),
            this.totalTk(),
            this.subtotal(),
            this.vat(),
                this.paid()

        },
        data(){
            return{
                orders:[],
                ptotals:'',
                subtotals:'',
                vats:'',
                pays:'',
                errors:{}
            }
        },
        methods:{
            ordersDetails(){
                axios.get('/api/latestOrder')
                    .then(({data}) =>(this.orders = data))
                    .catch(error => this.errors = error.response.data.errors)
            },
            totalTk(){
                axios.get('/api/total')
                    .then(({data}) =>(this.ptotals = data))
                    .catch(error => this.errors = error.response.data.errors)
            },
            subtotal(){
                axios.get('/api/subtotal')
                    .then(({data}) =>(this.subtotals = data))
                    .catch(error => this.errors = error.response.data.errors)
            },
            vat(){
                axios.get('/api/vat')
                    .then(({data}) =>(this.vats = data))
                    .catch(error => this.errors = error.response.data.errors)
            },
            paid(){
                axios.get('/api/paid')
                    .then(({data}) =>(this.pays = data))
                    .catch(error => this.errors = error.response.data.errors)
            },
            print(){
                window.print()
                this.$router.push('/pos-dashboard')
            }
        }

    }</script>

<style scoped>
    * {
        font-size: 12px;
        font-family: 'Times New Roman';
    }

    td,
    th,
    tr,
    table {
        border-top: 1px solid black;
        border-collapse: collapse;
    }

    td.description,
    th.description {
        width: 75px;
        max-width: 75px;
    }

    td.quantity,
    th.quantity {
        width: 40px;
        max-width: 40px;
        word-break: break-all;
    }

    td.price,
    th.price {
        width: 40px;
        max-width: 40px;
        word-break: break-all;
    }

    .centered {
        text-align: center;
        align-content: center;
    }

    .ticket {
        width: 155px;
        max-width: 155px;
    }

    img {
        max-width: inherit;
        width: inherit;
    }

    @media print {
        .hidden-print,
        .hidden-print * {
            display: none !important;
        }
    }
</style>
