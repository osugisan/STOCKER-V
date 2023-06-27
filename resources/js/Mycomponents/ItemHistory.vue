<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
<!-- モーダル -->
<div class="text-center mt-5">
    <button data-modal-target="history-modal" data-modal-toggle="history-modal" type="button" class="w-2/3 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-lg px-5 py-2.5 text-center mr-2 mb-2">
        入出庫履歴を見る
    </button>
</div>
<!-- 親モーダル -->
<div id="history-modal" tabindex="-1" class="fixed z-60 top-0 left-0 right-0 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
	<div class="relative w-full max-w-lg max-h-full">
		<!-- Modal content -->
		<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
			<!-- Modal header -->
			<div class="flex items-center justify-center p-4 border-b rounded-t dark:border-gray-600">
				<h3 class="text-xl font-medium text-gray-900 dark:text-white">
					入出庫履歴
				</h3>
				<button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="history-modal">
					<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
					<span class="sr-only">Close modal</span>
				</button>
			</div>
			<!-- Modal body -->
			<div class="px-4 space-y-6">
				<ul class="text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDividerButton">
                    <li>
                        <button data-modal-target="history-edit" data-modal-toggle="history-edit" data-modal-hide="history-modal" type="button" class="block w-full border-b px-4 py-2 text-gray-800 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            <div class="grid grid-cols-3">
                                <span class="col-span-2 text-lg text-left">0 → 2</span>
                                <span class="bg-blue-100 text-blue-800 text-sm text-center font-medium px-2.5 py-1.5 rounded-full dark:bg-blue-900 dark:text-blue-300">入庫</span>
                            </div>
                            <div class="grid grid-cols-12">
                                <svg class="col-span-1 w-3.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path d="M2.695 14.763l-1.262 3.154a.5.5 0 00.65.65l3.155-1.262a4 4 0 001.343-.885L17.5 5.5a2.121 2.121 0 00-3-3L3.58 13.42a4 4 0 00-.885 1.343z"></path>
                                </svg>
                                <p class="col-span-11 text-xs text-left">〇〇店で購入</p>
                            </div>
                            <p class="col-span-2 text-xs text-right mt-1">2023/6/10 10:40</p>
                        </button>
                    </li>
                    <li>
                        <button data-modal-target="history-edit" data-modal-toggle="history-edit" data-modal-hide="history-modal" type="button" class="block w-full border-b px-4 py-2 text-gray-800 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            <div class="grid grid-cols-3">
                                <span class="col-span-2 text-lg text-left">2 → 1</span>
                                <span class="bg-red-200 text-red-800 text-sm text-center font-medium px-2.5 py-1.5 rounded-full dark:bg-blue-900 dark:text-blue-300">出庫</span>
                            </div>
                            <div class="grid grid-cols-12">
                                <svg class="col-span-1 w-3.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path d="M2.695 14.763l-1.262 3.154a.5.5 0 00.65.65l3.155-1.262a4 4 0 001.343-.885L17.5 5.5a2.121 2.121 0 00-3-3L3.58 13.42a4 4 0 00-.885 1.343z"></path>
                                </svg>
                                <p class="col-span-11 text-xs text-left"></p>
                            </div>
                            <p class="col-span-2 text-xs text-right mt-1">2023/6/10 10:40</p>
                        </button>
                    </li>
                </ul>
                <div class="pb-4">
                    <Link :href="route('items.history')" as="button" class="block mx-auto text-sm text-indigo-700" data-modal-hide="history-modal">
						もっと見る...
					</Link>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- 子モーダル -->
<div id="history-edit" tabindex="-1" class="fixed z-60 top-0 left-0 right-0 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
	<div class="relative w-full max-w-md max-h-full">
		<!-- Modal content -->
		<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
			<!-- Modal header -->
			<div class="flex items-center justify-center p-2 border-b rounded-t dark:border-gray-600">
				<h3 class="text-xl font-medium text-gray-900 dark:text-white">
					履歴詳細・メモ入力
				</h3>
				<button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="history-edit">
					<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
					<span class="sr-only">Close modal</span>
				</button>
			</div>
			<!-- Modal body -->
			<div class="px-4 space-y-6">
				<ul class="text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDividerButton">
					<li>
						<div class="block w-full px-4 py-2 text-gray-800">
							<div class="grid grid-cols-3 border-b pb-2 mb-2">
								<span class="col-span-2 text-lg text-left">0 → 2</span>
								<span class="bg-blue-100 text-blue-800 text-sm text-center font-medium px-2.5 py-1.5 rounded-full dark:bg-blue-900 dark:text-blue-300">入庫</span>
							</div>
							<p class="text-xs text-left">変更者 : おすぎさん</p>
							<p class="text-xs text-left">更新日 : 2023/6/10 10:40</p>
							<div class="relative z-0 mt-1">
								<label for="history_memo text-xs">メモ</label>
								<input type="text" id="history_memo" class="text-xs text-gray-900 px-0 w-full bg-transparent border-b-2 border-transparent border-0 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-gray-400 peer" placeholder="〇〇店で購入..." />
								<div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
									<svg class="w-4 h-4 text-gray-600 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
										<path d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z"></path>
										<path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z"></path>
									</svg>
								</div>
							</div>
							<div class="pb-2">
								<div data-modal-hide="history-edit" class="block text-center text-xs text-indigo-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
									戻る
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
</template>