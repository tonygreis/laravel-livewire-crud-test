<div>
    <form wire:submit.prevent="store">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
            <div class="-mx-3 md:flex mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                        Titulli
                    </label>
                    <input
                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                        type="text"
                        wire:model.lazy="post.title"
                        placeholder="Titulli">
                </div>
                @error('name')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="-mx-3 md:flex mb-6">
                <div class="w-full px-3">
                    <label class='block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2'>Type</label>
                    <div class="flex-shrink w-full inline-block relative">
                        <select wire:model.lazy="parent" class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded">
                            <option selected value="" disabled>Zgjidh</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute top-0 mt-3  right-0 flex items-center px-2 text-gray-600">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
            </div>
            @if(!empty($children))
                <div class="-mx-3 md:flex mb-6">
                    <div class="w-full px-3">
                        <label class='block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2'>Type</label>
                        <div class="flex-shrink w-full inline-block relative">
                            <select wire:model.lazy="post.category_id" class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded">
                                <option selected value="" disabled>Zgjidh</option>
                                @foreach($children as $child)
                                    <option value="{{ $child->id }}">{{ $child->name }}</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute top-0 mt-3  right-0 flex items-center px-2 text-gray-600">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="-mx-3 md:flex mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
                        Pershkrimi
                    </label>
                    <textarea
                        wire:model.lazy="post.description"
                        class=" no-resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none"></textarea>
                </div>
                @error('description')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            @if(!empty($fields))
                @foreach($fields as $field)
                    @if($field->type == 'select')
                        <div class="-mx-3 md:flex mb-6">
                            <div class="w-full px-3">
                                <label class='block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2'>{{ $field->name }}</label>
                                <div class="flex-shrink w-full inline-block relative">
                                    <select wire:model.lazy="post.1" class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded">
                                        <option selected value="" disabled>Zgjidh</option>
                                    </select>
                                    <div class="pointer-events-none absolute top-0 mt-3  right-0 flex items-center px-2 text-gray-600">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($field->type == 'text')
                            <div class="-mx-3 md:flex mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                                        {{ $field->name }}
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                                        type="text"
                                        wire:model.lazy="title"
                                        placeholder="Titulli">
                                </div>
                                @error('name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        @endif
                    @if($field->type == 'radio')
                            <div class="-mx-3 md:flex mb-6">
                                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                                    {{ $field->name }}
                                </label>
                                <div class="w-full px-3">
                                    <label class="block text-gray-500 font-bold" for="remember">
                                        <input class="ml-2 leading-tight" type="radio" id="remember" name="remember" wire:model.lazy="cf[$field->id]">
                                        <span class="text-sm">
                                           {{ $field->name }}
                                        </span>
                                    </label>
                                </div>
                            </div>
                        @endif
                    @if($field->type == 'checkbox')
                            <div class="-mx-3 md:flex mb-6">
                                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                                    {{ $field->name }}
                                </label>
                                <div class="w-full px-3">
                                    @foreach($field->options as $op)
                                    <label class="block text-gray-500 font-bold">
                                        <input class="ml-2 leading-tight" type="checkbox" id="remember" name="remember" wire:model.lazy="post.{{ $field->id }}">
                                        <span class="text-sm">
                                           {{ $op->value }}
                                        </span>
                                    </label>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                @endforeach
            @endif
            <button type="submit" class="transition duration-500 bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Create
            </button>
        </div>
    </form>

</div>
