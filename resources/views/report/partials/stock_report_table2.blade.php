<table class="table table-bordered table-striped" id="stock_report_table">
    <thead>
        <tr>
            <th>SKU</th>
            <th>@lang('business.product')</th>
            <th>@lang('sale.location')</th>
            <th>@lang('sale.unit_price')</th>
            <th>@lang('Current Stock')</th>
            <th>@lang('Stock Enter By User')</th>
            <th>@lang('Difference')</th>
            @can('view_product_stock_value')
            <th class="stock_price">@lang('lang_v1.total_stock_price') <br><small>(@lang('lang_v1.by_purchase_price'))</small></th>
            <th>@lang('lang_v1.total_stock_price') <br><small>(@lang('lang_v1.by_sale_price'))</small></th>
            <th>@lang('lang_v1.potential_profit')</th>
            @endcan
            <th>@lang('report.total_unit_sold')</th>
            <th>@lang('lang_v1.total_unit_transfered')</th>
            <th>@lang('lang_v1.total_unit_adjusted')</th>
            @if($show_manufacturing_data)
                <th class="current_stock_mfg">@lang('manufacturing::lang.current_stock_mfg') @show_tooltip(__('manufacturing::lang.mfg_stock_tooltip'))</th>
            @endif
        </tr>
    </thead>
    <tfoot>
        <tr class="bg-gray font-17 text-center footer-total">
            <td colspan="4"><strong>@lang('sale.total'):</strong></td>
            {{-- <td class="footer_total_stock"></td> --}}
            @can('view_product_stock_value')
            <td class="footer_total_stock_price"></td>
            <td class="footer_stock_value_by_sale_price"></td>
            <td class="footer_potential_profit"></td>
            @endcan
            <td class="footer_total_sold"></td>
            <td class="footer_total_transfered"></td>
            <td class="footer_total_adjusted"></td>
            @if($show_manufacturing_data)
                <td class="footer_total_mfg_stock"></td>
            @endif
        </tr>
    </tfoot>
</table>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
$(document).ready(function(){

        $(document).on('change','.new_stock',function(){

            

            var oldstock=$(this).attr('data-id');
            
            var stid=$(this).attr('data-name');
            
                var stockqun = $(this).val();
                // alert(stockqun);
        
             var totalstock=oldstock-stockqun;


             $.ajax({
									type: "get",
									url:  '/stocktotal/' + stid + '/' + totalstock + '/'+ stockqun ,
									success:function(data){

										}

									})

             
            
            


        })
})
</script>