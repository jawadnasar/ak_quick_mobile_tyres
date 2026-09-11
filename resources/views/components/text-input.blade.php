@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-slate-200 focus:border-brand-500 focus:ring-brand-500 rounded-xl shadow-sm transition']) }}>
