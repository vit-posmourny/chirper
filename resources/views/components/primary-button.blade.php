<button {{$attributes->merge(
   
    [ "class" => "px-6 py-2.5 text-md font-semibold text-center text-white transition duration-300 rounded-lg hover:from-purple-600 hover:to-pink-600 ease bg-gradient-to-br from-purple-500 to-pink-500 md:w-auto"]
    
)}}> {{$slot}} </button>
