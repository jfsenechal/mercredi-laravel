<?php

declare(strict_types=1);

use App\Filament\Resources\Attendances\Pages\ListAttendances;
use App\Filament\Resources\Children\Pages\CreateChild;
use App\Filament\Resources\Children\Pages\ListChildren;
use App\Filament\Resources\Guardians\Pages\ListGuardians;
use App\Filament\Resources\Invoices\Pages\CreateInvoice;
use App\Filament\Resources\Invoices\Pages\ListInvoices;
use App\Filament\Resources\Schools\Pages\CreateSchool;
use App\Filament\Resources\Schools\Pages\ListSchools;
use App\Models\Attendance;
use App\Models\Child;
use App\Models\Guardian;
use App\Models\Invoice;
use App\Models\School;
use App\Models\User;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Livewire\livewire;

beforeEach(function () {
    $this->actingAs(User::factory()->create());
});

it('lists schools', function () {
    $schools = School::factory()->count(3)->create();

    livewire(ListSchools::class)
        ->loadTable()
        ->assertCanSeeTableRecords($schools);
});

it('creates a school', function () {
    livewire(CreateSchool::class)
        ->fillForm([
            'name' => 'École du Centre',
            'email' => 'centre@example.test',
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    assertDatabaseHas(School::class, [
        'name' => 'École du Centre',
    ]);
});

it('lists guardians', function () {
    $guardians = Guardian::factory()->count(3)->create();

    livewire(ListGuardians::class)
        ->loadTable()
        ->assertCanSeeTableRecords($guardians);
});

it('lists children', function () {
    $children = Child::factory()->count(3)->create();

    livewire(ListChildren::class)
        ->loadTable()
        ->assertCanSeeTableRecords($children);
});

it('creates a child', function () {
    livewire(CreateChild::class)
        ->fillForm([
            'last_name' => 'Dupont',
            'first_name' => 'Léa',
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    assertDatabaseHas(Child::class, [
        'last_name' => 'Dupont',
        'first_name' => 'Léa',
    ]);
});

it('lists invoices', function () {
    $invoices = Invoice::factory()->count(3)->create();

    livewire(ListInvoices::class)
        ->loadTable()
        ->assertCanSeeTableRecords($invoices);
});

it('creates an invoice', function () {
    $guardian = Guardian::factory()->create();

    livewire(CreateInvoice::class)
        ->fillForm([
            'guardian_id' => $guardian->id,
            'invoiced_at' => now(),
            'month' => 'June',
            'last_name' => 'Martin',
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    assertDatabaseHas(Invoice::class, [
        'last_name' => 'Martin',
        'month' => 'June',
    ]);
});

it('lists attendances', function () {
    $attendances = Attendance::factory()->count(3)->create();

    livewire(ListAttendances::class)
        ->loadTable()
        ->assertCanSeeTableRecords($attendances);
});
