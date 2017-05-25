<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Invoice;
use App\InvoiceProduct;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
      $search=$request->get('search');
      $invoices = Invoice::where('invoice_name','like','%'.$search.'%')->orderBy('invoice_name', 'desc')->paginate(5);

        return view('invoices.index', compact('invoices'));
    }

    public function create()
    {
        return view('invoices.create');
    }

    public function store(Request $request)
    {
        // $products = collect($request->products)->transform(function($product) {
        //     $product['total'] = $product['qty'] * $product['price'];
        //
        //      return new InvoiceProduct($product);
        //
        // });

        $products=new InvoiceProduct();

        $products->name=serialize($request->get('name'));
        $products->qty=$request->get('qty');
        $products->price=$request->get('price');


        $products->total=$products->qty*$products->price;

          $data = $request->except('products');
          // var_dump($data);
          $data['sub_total'] = $products->total;

          // $data['sub_total'] = $products->sum('total');
          $data['grand_total'] = $data['sub_total'] + $data['discount'];

          $invoice = Invoice::create($data);
        //  var_dump($invoice);

          $invoice->products()->save($products);

        return response()
            ->json([
                'created' => true,
                'id' => $invoice->id,
            ]);

        // $products=serialize($request->get('price'));
        // var_dump(array($products));
  }

    public function show($id)
    {
        $invoice = Invoice::with('products')->findOrFail($id);
        return view('invoices.show', compact('invoice'));
    }

    public function edit($id)
    {
        $invoice = Invoice::with('products')->findOrFail($id);
        return view('invoices.edit', compact('invoice'));
    }

    public function update(Request $request, $id)
    {
        $invoice = Invoice::findOrFail($id);

        $products = collect($request->products)->transform(function($product) {
            $product['total'] = $product['qty'] * $product['price'];
            return new InvoiceProduct($product);
        });


        $data = $request->except('products');
        $data['sub_total'] = $products->sum('total');
        $data['grand_total'] = $data['sub_total'] - $data['discount'];

        $invoice->update($data);

        InvoiceProduct::where('invoice_id', $invoice->id)->delete();

        $invoice->products()->saveMany($products);

        return response()
            ->json([
                'updated' => true,
                'id' => $invoice->id
            ]);
    }

    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);

        InvoiceProduct::where('invoice_id', $invoice->id)
            ->delete();

        $invoice->delete();

        return redirect()
            ->route('invoices.index');
    }
}
