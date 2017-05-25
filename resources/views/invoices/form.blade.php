<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Invoice Name</label>
            <input type="text" name="invoice_name" class="form-control" v-model="form.invoice_name">
        </div>
    </div>
</div>
    <table class="table table-bordered table-form">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="product in form.products">
                <td>
                    <input type="text" name="name[]" v-model="product.name">
                </td>
                <td>
                    <input type="text" name="price" v-model="product.price">
                </td>
                <td>
                    <input type="text" name="qty" v-model="product.qty">
                </td>
                <td class="table-total">
                    <span class="table-text" name='total'>@{{ product.qty * product.price }}</span>
                </td>
                <td class="table-remove">
                    <span @click="remove(product)" class="table-remove-btn">&times;</span>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan=3><a href="#" @click="addLine()">Add Line</a></td>
                <td>Sub Total</td>
                <td>@{{subTotal}}</td>
            </tr>
            <tr>
                <td colspan=3></td>
                <td>Tax</td>
                <td>
                    <input type="text" name="discount" v-model="form.discount">
                </td>
            </tr>
            <tr>
                <td colspan=3></td>
                <td>Grand Total</td>
                <td>@{{grandTotal}}</td>
            </tr>
        </tfoot>
    </table>
