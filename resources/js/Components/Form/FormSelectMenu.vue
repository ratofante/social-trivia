<script setup>
import { ref } from "vue";
import {
    Listbox,
    ListboxButton,
    ListboxLabel,
    ListboxOption,
    ListboxOptions,
} from "@headlessui/vue";
import {
    CheckIcon,
    ChevronUpDownIcon,
    BeakerIcon,
    PaintBrushIcon,
    TrophyIcon,
    GlobeAmericasIcon,
} from "@heroicons/vue/20/solid";

const categories = [
    {
        id: 1,
        name: "artes",
    },
    {
        id: 2,
        name: "deportes",
    },
    {
        id: 3,
        name: "historia",
    },
    {
        id: 4,
        name: "ciencias",
    },
];

const selected = ref(categories[0]);
</script>

<template>
    <Listbox as="div" v-model="selected">
        <ListboxLabel class="block text-sm font-medium leading-6 text-gray-900"
            >Assigned to</ListboxLabel
        >
        <div class="relative mt-2">
            <ListboxButton
                class="relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:text-sm sm:leading-6"
            >
                <span class="flex items-center">
                    <span>
                        <PaintBrushIcon
                            v-if="selected.name === 'artes'"
                            class="w-5 h-5"
                        />
                        <TrophyIcon
                            v-if="selected.name === 'deportes'"
                            class="w-5 h-5"
                        />
                        <GlobeAmericasIcon
                            v-if="selected.name === 'historia'"
                            class="w-5 h-5"
                        />
                        <BeakerIcon
                            v-if="selected.name === 'ciencias'"
                            class="w-5 h-5"
                        />
                    </span>
                    <span class="ml-3 block truncate">{{ selected.name }}</span>
                </span>
                <span
                    class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2"
                >
                    <ChevronUpDownIcon
                        class="h-5 w-5 text-gray-400"
                        aria-hidden="true"
                    />
                </span>
            </ListboxButton>

            <transition
                leave-active-class="transition ease-in duration-100"
                leave-from-class="opacity-100"
                leave-to-class="opacity-0"
            >
                <ListboxOptions
                    class="absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                >
                    <ListboxOption
                        as="template"
                        v-for="category in categories"
                        :key="category.id"
                        :value="category"
                        v-slot="{ active, selected }"
                    >
                        <li
                            :class="[
                                active ? 'bg-gray text-white' : 'text-gray-900',
                                'relative cursor-default select-none py-2 pl-3 pr-9',
                            ]"
                        >
                            <div class="flex items-center">
                                <span>
                                    <PaintBrushIcon
                                        v-if="category.name === 'artes'"
                                        class="w-5 h-5"
                                    />
                                    <TrophyIcon
                                        v-if="category.name === 'deportes'"
                                        class="w-5 h-5"
                                    />
                                    <GlobeAmericasIcon
                                        v-if="category.name === 'historia'"
                                        class="w-5 h-5"
                                    />
                                    <BeakerIcon
                                        v-if="category.name === 'ciencias'"
                                        class="w-5 h-5"
                                    />
                                </span>
                                <span
                                    :class="[
                                        selected
                                            ? 'font-medium'
                                            : 'font-normal',
                                        'ml-3 block truncate',
                                    ]"
                                    >{{ category.name }}</span
                                >
                            </div>

                            <span
                                v-if="selected"
                                :class="[
                                    active ? 'text-gray-light' : 'text-green',
                                    'absolute inset-y-0 right-0 flex items-center pr-4',
                                ]"
                            >
                                <CheckIcon class="h-5 w-5" aria-hidden="true" />
                            </span>
                        </li>
                    </ListboxOption>
                </ListboxOptions>
            </transition>
        </div>
    </Listbox>
</template>
