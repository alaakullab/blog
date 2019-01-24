<?php

namespace App\DataTables;

use App\Order;
//use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Services\DataTable;

// Auto DataTable By Baboon Script
// Baboon Maker has been Created And Developed By [It V 1.0 | https://it.phpanonymous.com]
// Copyright Reserved [It V 1.0 | https://it.phpanonymous.com]
class OrderDataTable extends DataTable {

	/**
	 * Display a listing of the resource.
	 * Auto Ajax Method By Baboon Script [It V 1.0 | https://it.phpanonymous.com]
	 * @return \Illuminate\Http\Response
	 */

	/**
	 * Display ajax response.
	 * Auto Ajax Method By Baboon Script [It V 1.0 | https://it.phpanonymous.com]
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function dataTable(DataTables $dataTables, $query) {
		return datatables($query)
			->addColumn('actions', 'admin.order.buttons.actions')
			->addColumn('user_id', 'admin.order.buttons.order_by')
			->addColumn('id_1', 'admin.order.buttons.name')
			->addColumn('id_2', 'admin.order.buttons.qty')
			->addColumn('id_3', 'admin.order.buttons.price')
			->addColumn('checkbox', '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
			<input type="checkbox" class="selected_data" name="selected_data[]" value="{{ $id }}"> <span></span></label>')
			->rawColumns(['checkbox', 'show_action', 'actions', 'user', 'date']);
	}

	/**
	 * Get the query object to be processed by dataTables.
	 * Auto Ajax Method By Baboon Script [It V 1.0 | https://it.phpanonymous.com]
	 * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
	 */
	public function query() {
		if (request()->has('pending')) {
			return Order::query()->where('delivered', '0');

		}
		if (request()->has('delivered')) {
			return Order::query()->where('delivered', '1');

		}
		if (!request()->has('delivered') and !request()->has('pending') ) {
			return Order::query()->orderBy('id', 'desc');

		}

	}

	/**
	 * Optional method if you want to use html builder.
	 *[It V 1.0 | https://it.phpanonymous.com]
	 * @return \Yajra\Datatables\Html\Builder
	 */
	public function html() {
		$html = $this->builder()
			->columns($this->getColumns())
			->ajax('')
			->parameters([
				'dom' => 'Blfrtip',
				"lengthMenu" => [[10, 25, 50, 100, -1], [10, 25, 50, 100, trans('admin.all_records')]],
				'buttons' => [
					['extend' => 'print', 'className' => 'btn dark btn-outline', 'text' => '<i class="fa fa-print"></i> ' . trans('admin.print')],
					['extend' => 'excel', 'className' => 'btn green btn-outline', 'text' => '<i class="fa fa-file-excel-o"> </i> ' . trans('admin.export_excel')],
					/*['extend' => 'pdf', 'className' => 'btn red btn-outline', 'text' => '<i class="fa fa-file-pdf-o"> </i> '.trans('admin.export_pdf')],*/
					['extend' => 'csv', 'className' => 'btn purple btn-outline', 'text' => '<i class="fa fa-file-excel-o"> </i> ' . trans('admin.export_csv')],
					['extend' => 'reload', 'className' => 'btn blue btn-outline', 'text' => '<i class="fa fa fa-refresh"></i> ' . trans('admin.reload')],
					[
						'text' => '<i class="fa fa-trash"></i> ' . trans('admin.delete'),
						'className' => 'btn red btn-outline deleteBtn',
					],
				],
				'initComplete' => "function () {
                this.api().columns([1,2]).every(function () {
                var column = this;
                var input = document.createElement(\"input\");
                $(input).attr( 'style', 'width: 100%');
                $(input).attr( 'class', 'form-control');
                $(input).appendTo($(column.footer()).empty())
                .on('keyup', function () {
                    column.search($(this).val()).draw();
                });
            });
            }",
				'order' => [[1, 'desc']],

				'language' => [
					'sProcessing' => trans('admin.sProcessing'),
					'sLengthMenu' => trans('admin.sLengthMenu'),
					'sZeroRecords' => trans('admin.sZeroRecords'),
					'sEmptyTable' => trans('admin.sEmptyTable'),
					'sInfo' => trans('admin.sInfo'),
					'sInfoEmpty' => trans('admin.sInfoEmpty'),
					'sInfoFiltered' => trans('admin.sInfoFiltered'),
					'sInfoPostFix' => trans('admin.sInfoPostFix'),
					'sSearch' => trans('admin.sSearch'),
					'sUrl' => trans('admin.sUrl'),
					'sInfoThousands' => trans('admin.sInfoThousands'),
					'sLoadingRecords' => trans('admin.sLoadingRecords'),
					'oPaginate' => [
						'sFirst' => trans('admin.sFirst'),
						'sLast' => trans('admin.sLast'),
						'sNext' => trans('admin.sNext'),
						'sPrevious' => trans('admin.sPrevious'),
					],
					'oAria' => [
						'sSortAscending' => trans('admin.sSortAscending'),
						'sSortDescending' => trans('admin.sSortDescending'),
					],
				],
			]);

		return $html;

	}

	/**
	 * Get columns.
	 * Auto getColumns Method By Baboon Script [It V 1.0 | https://it.phpanonymous.com]
	 * @return array
	 */

	protected function getColumns() {
		return [
			[
				'name' => 'checkbox',
				'data' => 'checkbox',
				'title' => '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                  <input type="checkbox" class="select-all" onclick="select_all()" >
                  <span></span></label>',
				'orderable' => false,
				'searchable' => false,
				'exportable' => false,
				'printable' => false,
				'width' => '10px',
				'aaSorting' => 'none',
			],
			[
				'name' => 'user_id',
				'data' => 'user_id',
				'title' => trans('admin.Order_by'),
			],
			[
				'name' => 'name',
				'data' => 'id_1',
				'title' => trans('admin.name'),
			],
			[
				'name' => 'qty',
				'data' => 'id_2',
				'title' => trans('admin.qty'),
			],
			[
				'name' => 'price',
				'data' => 'id_3',
				'title' => trans('admin.price'),
			],
			[
				'name' => 'total',
				'data' => 'total',
				'title' => trans('admin.total'),
			],
			[
				'name' => 'created_at',
				'data' => 'created_at',
				'title' => trans('admin.created_at'),
			],

			[
				'name' => 'actions',
				'data' => 'actions',
				'title' => trans('admin.actions'),
				'exportable' => false,
				'printable' => false,
				'searchable' => false,
				'orderable' => false,
			],
		];
	}

	/**
	 * Get filename for export.
	 * Auto filename Method By Baboon Script
	 * @return string
	 */
	protected function filename() {
		return 'Order_' . time();
	}

}
