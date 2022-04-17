@php
    $class = $status === 'success' ? 'bg-green-800' : 'bg-red-800';
    $label = $status === 'success' ? 'bg-green-500' : 'bg-red-500';
@endphp



<div class="s-alert p-4 {{ $class }} items-center text-indigo-100 leading-none flex rounded-md">
    <span class="flex rounded-full {{ $label }} uppercase px-2 py-1 text-xs font-bold mr-3">{{ $status }}</span>
    <span class="font-semibold mr-2 ">{{ $msg }}</span>
    <span class="close ml-auto cursor-pointer">
        <i class="fa-solid fa-xmark"></i>
    </span>
</div>

<style>
    .s-alert{
        animation: animAlert .5s ease forwards;
        transform: scale(1.09);
    }

    @keyframes animAlert{
        to{
            transform: scale(1);
        }
    }
</style>

<script>
    document.querySelector('.close').addEventListener('click',()=>{
        document.querySelector('.s-alert').classList.add('hidden');
    })
</script>