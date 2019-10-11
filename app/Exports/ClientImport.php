<?php

namespace AllBlacks\Exports;

use Maatwebsite\Excel\Cell;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

class ClientExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    public function headings(): array
    {
        return [
            'nome',
            'documento',
            'cep',
            'endereço',
            'bairro',
            'cidade',
            'uf',
            'telefone',
            'e-mail',
            'ativo'
        ];
    }

    public function bindValue(Cell $cell, $value)
    {
        if (is_numeric($value)) {
            $cell->setValueExplicit($value, DataType::TYPE_NUMERIC);

            return true;
        }
        if (is_string($value)) {
            $cell->setValueExplicit($value, DataType::TYPE_STRING);

            return true;
        }
        if (is_bool($value)) {
            $cell->setValueExplicit($value, DataType::TYPE_BOOL);

            return true;
        }

        // else return default behavior
        return parent::bindValue($cell, $value);
    }

    public function map($invoice): array
    {
        return [
            $invoice->name,
            $invoice->document,
            $invoice->postcode,
            $invoice->address,
            $invoice->district,
            $invoice->city,
            $invoice->state,
            $invoice->telephone,
            $invoice->email,
            $invoice->active ? 'sim' : 'não',
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Client::all();
    }
}
