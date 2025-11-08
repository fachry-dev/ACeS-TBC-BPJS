<div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8">
    @foreach($doctors as $doctor)
        <div class="bg-white rounded-lg shadow-lg text-center p-6 ...">
            <img src="{{ asset('storage/' . $doctor->image_path) }}" alt="{{ $doctor->name }}">
            <h4 class="font-bold text-lg mt-4">{{ $doctor->name }}</h4>
            <p class="text-gray-500 text-sm">{{ $doctor->specialty }}</p>
        </div>
    @endforeach
</div>