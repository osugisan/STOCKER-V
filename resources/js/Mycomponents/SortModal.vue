<script setup>
  
</script>

<template>
<!-- モーダル -->
<!-- 親モーダル -->
<div id="small-modal" tabindex="-1" class="fixed z-60 top-0 left-0 right-0 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
	<div class="relative w-2/3 max-w-sm max-h-full">
		<!-- Modal content -->
		<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
			<!-- Modal header -->
			<div class="flex items-center justify-center p-5 border-b rounded-t dark:border-gray-600">
				<h3 class="text-xl font-medium text-gray-900 dark:text-white">
					並べ替え
				</h3>
				<button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="small-modal">
					<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
					<span class="sr-only">Close modal</span>
				</button>
			</div>
			<!-- Modal body -->
			<div class="p-6 space-y-6">
				<div class="flex items-center mb-4">
					<input id="default-radio-1" type="radio" value="" name="default-radio" checked class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
					<label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">名前順</label>
				</div>
				<div class="flex items-center">
					<input id="default-radio-2" type="radio" value="" name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
					<label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">登録日順</label>
				</div>
				<div class="flex items-center">
					<input id="default-radio-3" type="radio" value="" name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
					<label for="default-radio-3" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">更新日順</label>
				</div>
			</div>
			
			<div class="flex p-6 border-t border-gray-200">
				<div class="flex items-center mr-4">
					<input id="inline-radio" type="radio" value="" name="inline-radio-group" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
					<label for="inline-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">昇順</label>
				</div>
				<div class="flex items-center mr-4">
					<input id="inline-2-radio" type="radio" value="" name="inline-radio-group" checked class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
					<label for="inline-2-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">降順</label>
				</div>
			</div>
			<!-- Modal footer -->
			<div class="flex items-center px-6 pb-6 left-0 space-x-2 rounded-b dark:border-gray-600">
				<button data-modal-hide="small-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">決定</button>
				<button data-modal-hide="small-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">キャンセル</button>
			</div>
		</div>
	</div>
</div>
<!-- モーダル -->
</template>