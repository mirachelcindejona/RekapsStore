<!doctype html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $__env->yieldContent('title', 'Kasir'); ?> | Rekaps Bazar</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Carattere&family=Montserrat:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>

    <style>
        /* Custom Scrollbar */
        .pos-scroll::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        .pos-scroll::-webkit-scrollbar-track {
            background: transparent;
        }

        .pos-scroll::-webkit-scrollbar-thumb {
            background: #525252;
            border-radius: 10px;
        }

        .pos-scroll:hover::-webkit-scrollbar-thumb {
            background: #737373;
        }

        /* Hilangkan panah up/down di input type number */
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Custom Scrollbar 2*/
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background-color: #D4D4D4;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background-color: #A1A1A1;
        }

        .custom-scrollbar {
            scrollbar-width: thin;
            scrollbar-color: #D4D4D4 transparent;
        }
    </style>
</head>

<body class="font-['Montserrat',sans-serif] bg-[#F2EBFD] text-neutral-950 h-dvh w-full overflow-hidden flex relative">

    <div id="sidebarOverlay" class="hidden fixed inset-0 bg-black/50 z-[40] transition-opacity"
        onclick="toggleSidebar()"></div>

    <aside id="sidebar"
        class="w-[80px] h-full bg-black flex flex-col items-center justify-between py-[24px] shrink-0 z-[50] absolute min-[900px]:relative transition-transform duration-300 -translate-x-full min-[900px]:translate-x-0">
        <div class="flex flex-col items-center w-full">
            <div class="w-full flex justify-center pb-[18px] border-b border-[#1E293B] mb-[24px]">
                <div class="w-[48px] h-[35px] relative flex justify-center items-center">
                    <svg width="48" height="35" viewBox="0 0 48 35" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_2902_17365)">
                            <path
                                d="M16.0567 21.2174C17.4884 21.2174 18.649 20.0827 18.649 18.6829C18.649 17.2832 17.4884 16.1484 16.0567 16.1484C14.625 16.1484 13.4644 17.2832 13.4644 18.6829C13.4644 20.0827 14.625 21.2174 16.0567 21.2174Z"
                                fill="#7D39EB" />
                            <path
                                d="M22.2294 34.6855C23.3884 34.6855 24.328 33.7669 24.328 32.6337C24.328 31.5006 23.3884 30.582 22.2294 30.582C21.0704 30.582 20.1309 31.5006 20.1309 32.6337C20.1309 33.7669 21.0704 34.6855 22.2294 34.6855Z"
                                fill="#7D39EB" />
                            <path
                                d="M9.88566 34.6855C11.0447 34.6855 11.9842 33.7669 11.9842 32.6337C11.9842 31.5006 11.0447 30.582 9.88566 30.582C8.72666 30.582 7.78711 31.5006 7.78711 32.6337C7.78711 33.7669 8.72666 34.6855 9.88566 34.6855Z"
                                fill="#7D39EB" />
                            <path
                                d="M9.87348 1.61719C14.1754 1.61719 17.6628 5.02677 17.6628 9.23269C17.6627 12.6763 15.3249 15.5855 12.1163 16.5271C12.055 16.3361 11.9918 16.1445 11.9253 15.9529C10.0198 10.4644 6.4989 6.39708 3.15918 5.37071C4.51372 3.12451 7.0134 1.61722 9.87348 1.61719Z"
                                fill="#7D39EB" />
                            <path
                                d="M1.049 5.85547C3.49155 6.15236 6.13367 8.22029 8.2376 11.3932C8.24614 11.4061 8.25461 11.4191 8.26315 11.432C8.3132 11.5079 8.36297 11.5843 8.4124 11.6614C8.4197 11.6728 8.42696 11.6842 8.43426 11.6956C8.66055 12.0501 8.88016 12.4176 9.09209 12.7972C9.09912 12.8098 9.10624 12.8224 9.11326 12.835C9.21051 13.01 9.30578 13.1878 9.39965 13.3678C9.40922 13.3861 9.41907 13.4043 9.42857 13.4227C9.52836 13.6152 9.62632 13.8106 9.72205 14.0087C9.73038 14.0259 9.73861 14.0432 9.7469 14.0606C9.78521 14.1403 9.82294 14.2206 9.86053 14.3011C9.87247 14.3267 9.88428 14.3524 9.89615 14.378C9.93082 14.453 9.96531 14.5282 9.99935 14.6038C10.0108 14.6294 10.0226 14.6548 10.034 14.6804C10.0719 14.7655 10.1091 14.8511 10.1463 14.9371C10.1536 14.954 10.1612 14.9708 10.1684 14.9877C10.211 15.0868 10.253 15.1865 10.2945 15.2868C10.3039 15.3094 10.3131 15.3321 10.3224 15.3548C10.3548 15.4338 10.3868 15.5131 10.4185 15.5927C10.4329 15.6287 10.447 15.6648 10.4612 15.7009C10.4856 15.7629 10.5099 15.8251 10.5339 15.8875C10.5541 15.9404 10.5744 15.9934 10.5943 16.0466C10.6144 16.1 10.6341 16.1536 10.6538 16.2073C10.6701 16.2515 10.6865 16.2957 10.7026 16.3401C10.7401 16.4439 10.7775 16.5481 10.8138 16.653C10.9217 16.9634 11.0221 17.2734 11.1161 17.5824C11.1336 17.6401 11.1504 17.698 11.1675 17.7556C11.1968 17.8544 11.226 17.9528 11.2539 18.0514C11.2653 18.0917 11.276 18.1321 11.2871 18.1723C11.3184 18.2851 11.3491 18.3977 11.3786 18.5102C11.3949 18.5725 11.4102 18.635 11.426 18.6972C11.448 18.784 11.4703 18.8706 11.4912 18.9571C11.5093 19.0319 11.5261 19.1067 11.5433 19.1813C11.5625 19.2642 11.5816 19.3468 11.5998 19.4294C11.6146 19.497 11.6286 19.5645 11.6428 19.6319C11.6599 19.7132 11.677 19.7943 11.6932 19.8754C11.7069 19.9439 11.7199 20.0125 11.7329 20.0808C11.7478 20.1595 11.7629 20.238 11.7769 20.3165C11.791 20.395 11.8041 20.4735 11.8173 20.5518C11.8301 20.6283 11.8429 20.7046 11.8549 20.7808C11.8658 20.8502 11.8763 20.9194 11.8865 20.9885C11.8977 21.0642 11.9085 21.1397 11.9188 21.215C11.9291 21.29 11.9389 21.3648 11.9484 21.4395C11.9576 21.513 11.9665 21.5864 11.9749 21.6597C11.9831 21.73 11.9907 21.8003 11.9981 21.8703C12.0061 21.9457 12.0136 22.0208 12.0206 22.0958C12.0274 22.1673 12.0339 22.2386 12.0398 22.3097C12.0458 22.3817 12.0514 22.4534 12.0566 22.525C12.0616 22.5934 12.0665 22.6617 12.0707 22.7297C12.0757 22.8089 12.0799 22.8877 12.0838 22.9664C12.087 23.0287 12.0901 23.0907 12.0926 23.1527C12.0954 23.2234 12.0976 23.2938 12.0996 23.364C12.1019 23.441 12.1037 23.5177 12.105 23.5941C12.106 23.6555 12.1063 23.7167 12.1067 23.7778C12.1071 23.8477 12.1077 23.9174 12.1074 23.9868C12.107 24.0547 12.1061 24.1222 12.105 24.1896C12.1038 24.2629 12.1021 24.3358 12.1 24.4085C12.0982 24.4669 12.0959 24.525 12.0936 24.583C12.0908 24.6533 12.0882 24.7233 12.0845 24.793C12.081 24.8596 12.0764 24.9258 12.0721 24.9918C12.0679 25.0559 12.0639 25.1196 12.059 25.1831C12.0529 25.2612 12.0456 25.3389 12.0385 25.4161C12.0338 25.4661 12.0298 25.516 12.0247 25.5657C12.0223 25.5891 12.0195 25.6126 12.017 25.636C12.0052 25.7447 11.9926 25.8525 11.9786 25.9594C11.9764 25.976 11.9741 25.9925 11.9719 26.009C11.9409 26.2394 11.9051 26.4654 11.8636 26.6867C11.862 26.6957 11.8603 26.7047 11.8586 26.7136C11.7668 27.1985 11.6501 27.6605 11.509 28.0959C11.4954 28.1379 11.4814 28.1796 11.4673 28.2211C11.4608 28.2405 11.4542 28.2598 11.4475 28.279C11.4376 28.3078 11.4278 28.3365 11.4176 28.3651C11.3862 28.4531 11.3535 28.5398 11.3201 28.6254C11.3147 28.6393 11.3094 28.6533 11.304 28.6671C11.2904 28.7013 11.2765 28.7352 11.2626 28.769C11.2565 28.7839 11.2507 28.7989 11.2445 28.8137C11.2293 28.8499 11.2136 28.8857 11.1981 28.9215C11.1929 28.9335 11.1878 28.9454 11.1826 28.9573C11.1426 29.0486 11.1018 29.1386 11.0592 29.2268L11.0589 29.2265C11 29.3486 10.9391 29.4681 10.8754 29.5841C8.61556 28.6904 6.64755 27.2392 5.14972 25.405C3.60986 23.5723 2.24946 21.1793 1.29472 18.4293C-0.396176 13.5588 -0.38081 8.81913 1.049 5.85547Z"
                                fill="#7D39EB" />
                            <path
                                d="M35.1298 0C39.0649 2.36551e-05 42.6224 1.58142 45.1745 4.12886C44.6495 4.06468 44.1153 4.03092 43.5735 4.03089C36.4365 4.03099 30.6042 9.76032 30.2027 16.982C30.187 18.4476 29.9369 19.8579 29.4871 21.1792L29.3943 21.4422L29.3946 21.4425C29.1539 22.1042 28.8623 22.7424 28.5253 23.3529C28.5141 23.3733 28.5024 23.3934 28.491 23.4138C28.4602 23.469 28.4292 23.5242 28.3976 23.5791C28.3904 23.5916 28.383 23.604 28.3758 23.6165C28.2997 23.7475 28.2215 23.8771 28.1411 24.0053C28.1263 24.029 28.1114 24.0527 28.0964 24.0763C28.0692 24.1191 28.0417 24.1617 28.0141 24.2041C27.9935 24.2358 27.973 24.2674 27.9522 24.2988C27.9291 24.3336 27.9056 24.3681 27.8823 24.4026C27.8596 24.4362 27.837 24.4698 27.814 24.5032C27.7904 24.5376 27.7664 24.5716 27.7424 24.6058C27.7199 24.6379 27.6977 24.6704 27.6749 24.7024C27.5795 24.8358 27.4814 24.9672 27.3814 25.0971C27.3599 25.1251 27.3379 25.1528 27.3162 25.1806C27.2881 25.2165 27.2599 25.2524 27.2315 25.288C27.2101 25.3148 27.1885 25.3413 27.167 25.3679C27.1378 25.4038 27.1087 25.4397 27.0792 25.4754C27.0493 25.5116 27.0191 25.5476 26.9888 25.5835C26.9731 25.602 26.9575 25.6206 26.9417 25.639C26.9034 25.684 26.8647 25.7287 26.8257 25.7731C26.8153 25.785 26.8046 25.7967 26.7941 25.8086C26.6148 26.012 26.4293 26.2101 26.2382 26.4028C26.2206 26.4206 26.2034 26.4387 26.1857 26.4564C26.1442 26.4978 26.1021 26.5387 26.06 26.5796C26.043 26.5962 26.026 26.6128 26.0089 26.6293C25.9677 26.6689 25.9262 26.7081 25.8846 26.7472C25.8681 26.7627 25.8516 26.7782 25.8351 26.7936C25.7931 26.8327 25.7509 26.8717 25.7084 26.9103C25.6925 26.9247 25.6766 26.939 25.6607 26.9533C24.6535 27.8596 23.5112 28.6245 22.2659 29.2144L22.24 29.2273C22.2068 29.2429 22.1729 29.2574 22.1395 29.2726C20.3209 30.1122 18.2889 30.5826 16.1442 30.5826C14.6395 30.5826 13.1903 30.3502 11.8311 29.9223C12.9859 26.7474 15.3005 24.1104 18.2764 22.4978L18.4334 22.3706C19.2102 21.7264 19.8574 20.9537 20.3387 20.0566C21.0448 18.7403 21.3244 17.2892 21.2265 15.8022C21.1236 15.1315 21.0695 14.4451 21.0695 13.7465C21.0695 10.6093 22.145 7.71777 23.9543 5.40434L24.0761 5.25118C26.6504 2.05372 30.6446 8.77766e-05 35.1298 0ZM25.3628 20.7852C26.4861 20.8068 27.577 20.9575 28.6208 21.2223C28.1859 21.1119 27.7429 21.0214 27.2927 20.9518C27.1126 20.924 26.9314 20.8996 26.7491 20.8785C26.5668 20.8574 26.3835 20.8395 26.1992 20.8253C25.9227 20.804 25.6436 20.7906 25.3628 20.7852ZM30.0905 15.0775L30.0605 14.8622C30.0574 14.8409 30.0537 14.8197 30.0505 14.7985C30.0645 14.8912 30.0783 14.9842 30.0905 15.0775ZM29.9506 14.2224L29.9073 14.0117C29.9023 13.9883 29.8969 13.965 29.8918 13.9417C29.9123 14.0349 29.9321 14.1284 29.9506 14.2224ZM29.7368 13.3094C29.7876 13.4969 29.8345 13.686 29.8773 13.8766C29.856 13.7819 29.834 13.6874 29.8108 13.5933C29.7936 13.524 29.7762 13.4548 29.758 13.386C29.7512 13.3603 29.7438 13.3349 29.7368 13.3094ZM28.5936 10.4416L28.4927 10.2575C28.4811 10.2367 28.4692 10.2159 28.4574 10.1951C28.5036 10.2767 28.549 10.3589 28.5936 10.4416ZM25.2566 6.36761C25.461 6.5378 25.6603 6.71361 25.8543 6.89476L25.6613 6.71761C25.5964 6.65919 25.5308 6.60134 25.4647 6.54409C25.396 6.48456 25.3265 6.42583 25.2566 6.36761ZM24.6455 5.8868C24.7124 5.93651 24.7789 5.98678 24.8448 6.03763C24.8344 6.02959 24.824 6.02135 24.8135 6.01334C24.7024 5.92806 24.5896 5.8446 24.4757 5.76255L24.6455 5.8868ZM27.2544 8.41148C27.2382 8.39122 27.2225 8.37055 27.2063 8.35036C27.1814 8.3194 27.1561 8.28874 27.131 8.25801C27.1725 8.30883 27.2135 8.36009 27.2544 8.41148ZM26.9666 8.0608C26.9575 8.05007 26.9486 8.03903 26.9394 8.02829C26.9013 7.98377 26.863 7.93951 26.8244 7.89549C26.8724 7.95018 26.9195 8.00541 26.9666 8.0608Z"
                                fill="#7D39EB" />
                        </g>
                        <defs>
                            <clipPath id="clip0_2902_17365">
                                <rect width="48" height="35" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>

                </div>
            </div>

            <div class="flex flex-col gap-[10px] w-full px-[14px]">
                <a href="<?php echo e(url('/admin/cashier')); ?>"
                    class="w-[40px] h-[40px] rounded-[8px] flex justify-center items-center mx-auto <?php echo e(request()->is('pengurus/cashier') ? 'bg-primary-500 text-neutral-50 shadow-[0_4px_14px_rgba(125,57,235,0.38)] relative group' : 'hover:bg-primary-500/20 transition-colors'); ?>">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 13.334H15.8333C16.2754 13.334 16.6993 13.1584 17.0118 12.8458C17.3244 12.5333 17.5 12.1093 17.5 11.6673V5.00065C17.5 4.55862 17.3244 4.1347 17.0118 3.82214C16.6993 3.50958 16.2754 3.33398 15.8333 3.33398H4.16667C3.72464 3.33398 3.30072 3.50958 2.98816 3.82214C2.67559 4.1347 2.5 4.55862 2.5 5.00065V11.6673C2.5 12.1093 2.67559 12.5333 2.98816 12.8458C3.30072 13.1584 3.72464 13.334 4.16667 13.334H10ZM10 13.334V16.6673M10 16.6673H13.3333M10 16.6673H6.66667"
                            stroke="<?php echo e(request()->is('pengurus/cashier') ? '#C6FF33' : '#D7C2F9'); ?>" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                </a>

                <a href="<?php echo e(url('/admin/cashier/orders')); ?>"
                    class="w-[40px] h-[40px] rounded-[8px] flex justify-center items-center mx-auto <?php echo e(request()->is('pengurus/cashier-orders') ? 'bg-primary-500 text-neutral-50 shadow-[0_4px_14px_rgba(125,57,235,0.38)] relative group' : 'hover:bg-primary-500/20 transition-colors'); ?>">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M4.16667 10.8333V4.16667C4.16667 3.72464 4.34226 3.30072 4.65482 2.98816C4.96738 2.67559 5.39131 2.5 5.83333 2.5H15.8333C16.2754 2.5 16.6993 2.67559 17.0118 2.98816C17.3244 3.30072 17.5 3.72464 17.5 4.16667V15C17.5 15.8333 17 17.5 15 17.5M15 17.5H5C4.16667 17.5 2.5 17 2.5 15V13.3333H12.5V15C12.5 17 14.1667 17.5 15 17.5ZM7.5 5.83333H14.1667M7.5 9.16667H10.8333"
                            stroke="<?php echo e(request()->is('pengurus/cashier-orders') ? '#C6FF33' : '#D7C2F9'); ?>"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>

                <a href="<?php echo e(url('/admin/cashier/recap')); ?>"
                    class="w-[40px] h-[40px] rounded-[8px] flex justify-center items-center mx-auto <?php echo e(request()->is('pengurus/cashier-recap') ? 'bg-primary-500 text-neutral-50 shadow-[0_4px_14px_rgba(125,57,235,0.38)] relative group' : 'hover:bg-primary-500/20 transition-colors'); ?>">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6.66683 13.334V9.16732M10.0002 13.334V6.66732M13.3335 13.334V11.6673M15.0002 3.33398H5.00016C4.55814 3.33398 4.13421 3.50958 3.82165 3.82214C3.50909 4.1347 3.3335 4.55862 3.3335 5.00065V15.0007C3.3335 15.4427 3.50909 15.8666 3.82165 16.1792C4.13421 16.4917 4.55814 16.6673 5.00016 16.6673H15.0002C15.4422 16.6673 15.8661 16.4917 16.1787 16.1792C16.4912 15.8666 16.6668 15.4427 16.6668 15.0007V5.00065C16.6668 4.55862 16.4912 4.1347 16.1787 3.82214C15.8661 3.50958 15.4422 3.33398 15.0002 3.33398Z"
                            stroke="<?php echo e(request()->is('pengurus/cashier-recap') ? '#C6FF33' : '#D7C2F9'); ?>"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                </a>
            </div>
        </div>

        <div class="flex flex-col gap-[10px] w-full px-[14px] pt-[14px] border-t border-[#1E293B]">
            <a href="<?php echo e(url('/admin')); ?>"
                class="w-[40px] h-[40px] rounded-[8px] flex justify-center items-center mx-auto hover:bg-primary-500/20 transition-colors">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6.66683 10.8327V13.3327M10.0002 8.33268V13.3327M13.3335 12.4993V13.3327M16.6668 15.8327V8.74935C16.6668 8.61998 16.6367 8.49238 16.5789 8.37667C16.521 8.26096 16.437 8.1603 16.3335 8.08268L10.5002 3.70768C10.3559 3.5995 10.1805 3.54102 10.0002 3.54102C9.81985 3.54102 9.64441 3.5995 9.50016 3.70768L3.66683 8.08268C3.56333 8.1603 3.47933 8.26096 3.42147 8.37667C3.36362 8.49238 3.3335 8.61998 3.3335 8.74935V15.8327C3.3335 16.0537 3.42129 16.2657 3.57757 16.4219C3.73385 16.5782 3.94582 16.666 4.16683 16.666H15.8335C16.0545 16.666 16.2665 16.5782 16.4228 16.4219C16.579 16.2657 16.6668 16.0537 16.6668 15.8327Z"
                        stroke="#D7C2F9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
            <form action="<?php echo e(route('admin.logout')); ?>" method="POST">

                <?php echo csrf_field(); ?>
                <button type="submit"
                    class="w-[40px] h-[40px] rounded-[8px] flex justify-center items-center mx-auto hover:bg-primary-500/20 transition-colors">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12.4998 13.3333L15.8332 10L12.4998 6.66667M15.8332 10H7.49984M11.6665 17.5C10.6816 17.5 9.70632 17.306 8.79638 16.9291C7.88644 16.5522 7.05964 15.9997 6.3632 15.3033C5.66676 14.6069 5.11432 13.7801 4.73741 12.8701C4.3605 11.9602 4.1665 10.9849 4.1665 10C4.1665 9.01509 4.3605 8.03982 4.73741 7.12987C5.11432 6.21993 5.66676 5.39314 6.3632 4.6967C7.05964 4.00026 7.88644 3.44781 8.79638 3.0709C9.70632 2.69399 10.6816 2.5 11.6665 2.5"
                            stroke="#D7C2F9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>

            </form>
        </div>
    </aside>

    <div class="flex-1 flex flex-col min-w-0 h-full relative z-10 w-full">

        <header
            class="h-[70px] bg-neutral-50 border-b border-neutral-200 flex items-center justify-between px-[14px] min-[560px]:px-[28px] gap-[14px] shrink-0 z-20 shadow-[0px_1px_10px_rgba(0,0,0,0.15)]">

            <div class="flex items-center gap-[14px]">
                <button
                    class="hidden max-[900px]:flex w-[40px] h-[40px] rounded-lg bg-neutral-200 items-center justify-center cursor-pointer text-[#000] outline-none border-none hover:bg-neutral-300"
                    onclick="toggleSidebar()">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5" stroke-linecap="round">
                        <line x1="3" y1="6" x2="21" y2="6" />
                        <line x1="3" y1="12" x2="21" y2="12" />
                        <line x1="3" y1="18" x2="21" y2="18" />
                    </svg>
                </button>

                <div class="flex items-center gap-[10px] min-[560px]:gap-[10px]">
                    <div class="flex flex-col justify-center pb-[2px] border-b border-[#F8FAFC]">
                        <div class="font-['Carattere'] text-[24px] leading-none text-primary-500">Rekaps Store</div>
                        <div class="font-bold text-[9px] leading-[12px] tracking-[2px] text-black">REKAPS BAZAR</div>
                    </div>

                    <div class="hidden min-[560px]:block h-[42px] border-l-[2px] border-black/20 mx-[5px]"></div>

                    <div class="hidden min-[560px]:flex flex-col">
                        <div class="font-bold text-[18px] text-black leading-[28px] mt-[-2px]"><?php echo $__env->yieldContent('page_title', 'Kasir'); ?></div>
                        <div class="flex items-center gap-[4px] text-[12px] font-medium leading-[16px]">
                            <span class="text-neutral-400">Rekaps Store /</span>
                            <span class="text-primary-500"><?php echo $__env->yieldContent('page_breadcrumb', 'Kasir'); ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-[11px]">
                <div id="realtimeClock"
                    class="font-bold text-[14px] text-black w-[58px] text-center hidden min-[560px]:block">00:00:00
                </div>
                <button
                    class="w-[40px] h-[40px] bg-primary-500 rounded-[8px] flex items-center justify-center text-white font-bold text-[12px] hover:bg-[#6b2fd1] transition-colors">
                    AR
                </button>
            </div>
        </header>

        <main
            class="flex-1 flex flex-col min-[900px]:flex-row gap-[20px] p-[14px] min-[560px]:p-[20px] overflow-y-auto min-h-0">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    <?php echo $__env->yieldContent('footer'); ?>

    <script>
        /* ---- Jam Realtime Bergerak (Jam:Menit:Detik) ---- */
        function updateClock() {
            const now = new Date();

            // Ambil Jam, Menit, dan Detik (pastikan 2 digit)
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');

            // Gabungkan dengan format HH:MM:SS
            document.getElementById('realtimeClock').textContent = `${hours}:${minutes}:${seconds}`;
        }

        // Jalankan saat pertama kali load
        updateClock();

        // Update setiap 1 detik
        setInterval(updateClock, 1000);

        /* ---- Sidebar Toggle Mobile ---- */
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('-translate-x-full');
            document.getElementById('sidebarOverlay').classList.toggle('hidden');
        }
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\rekapsapp-byweebs\resources\views/admin/layouts/layout-cashier.blade.php ENDPATH**/ ?>