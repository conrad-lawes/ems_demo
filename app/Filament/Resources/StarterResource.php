<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StarterResource\Pages;
use App\Filament\Resources\StarterResource\RelationManagers;
use App\Models\Starter;
use App\Models\StaffType;
use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
use App\Enums\Status;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Closure;


class StarterResource extends Resource
{
    protected static ?string $model = Starter::class;

    // protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?int $navigationSort = 1;

    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Select::make('staff_type_id')
                    ->label('Staff Type')
                    ->options(StaffType::orderby('id')->pluck('name', 'id'))
                    // ->searchable()
                    ->required()
                    // ->autofocus()
                    ->reactive(),                
                Forms\Components\TextInput::make('firstname')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('lastname')
                    ->required()
                    ->maxLength(255)
                    // ->reactive()
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Set $set, Get $get,  $state) {
                        $fn = trim(strtolower($get('firstname')));
                        $fn = str_replace(" ", ".", $fn);
                        $ln = trim(strtolower($state));
                        $ln = str_replace(" ", ".", $ln);
                        if ($get('staff_type_id') === '2')
                        {
                            $username = $fn . '.' .$ln.'_ext';
                        }
                        else
                        { 
                            $username = $fn . '.' .$ln;
                            $email = $fn . '.' .$ln.'@example.biz';
                            $set('email', $email);
                        }
                        
                        $set('username', strtolower($username));
                        // $set('legal_name', ucwords("$fn $ln"));
                        $random = str_shuffle('abcdefghjkimnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ234567890!$%^&!$%^&');
                        $password = substr($random, 0, 10);
                        $set('password', $password);
                        
                    }),
                // Forms\Components\TextInput::make('legal_name')
                //     ->maxLength(255) 
                //     ->hidden(function (Closure $get) {
                //         return  $get('staff_type_id') === '2';
                //     }),
                Forms\Components\TextInput::make('position')
                    ->label('Job Title')
                    ->required()
                    ->maxLength(255),   
                Forms\Components\TextInput::make('username')
                    ->required()
                    ->unique(Starter::class, ignoreRecord: true)
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique(Starter::class, ignoreRecord: true)
                    ->maxLength(255),     
                Forms\Components\TextInput::make('mobile')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('date_hired')
                    ->label('Start Date')
                    ->required(),
                Forms\Components\DatePicker::make('end_date')
                    ->label('End Date')
                    ->after('date_hired')
                    // ->date()
                    ->required()
                    ->visible(function (Get $get) {
                        return  $get('staff_type_id') === '2';  // Required for contractors
                    }),                       
                Forms\Components\Select::make('department_id')
                    ->label('Department')
                    ->options(Department::orderBy('name')->pluck('name', 'id'))                   
                    ->searchable()
                    ->required()
                    ->afterStateUpdated(fn (callable $set) => $set('manager_id', null)),
                Forms\Components\Select::make('manager_id')
                    ->label('Manager')
                    ->options(function (callable $get) {
                        $dept  = Department::find($get('department_id'));
                        if (! $dept)
                        {
                            return Employee::orderby('lastname')->pluck('fullname', 'id');
                        }
                        return $dept->employees->pluck('fullname', 'id');
                    })                    
                    ->searchable()
                    ->required(),                
                Forms\Components\Radio::make('notify')
                    ->label('Notify Stakeholders?')
                    ->options([
                        '0' => 'No',
                        '1' => 'Yes',                       
                    ])
                    ->required(),               
                Forms\Components\Select::make('status')
                    ->options(Status::class)
                    ->hiddenOn(['create']),                      
                Forms\Components\Select::make('user_id')
                    ->label("Author")
                    ->options(User::orderby('name')->pluck('name', 'id'))
                    ->hiddenOn(['create','edit']),                                    
                     
            ]);
    }

    protected function getDefaultTableSortColumn(): ?string
    {
        return 'id';
    }
 
    protected function getDefaultTableSortDirection(): ?string
    {
        return 'desc';
    }

    public static function table(Table $table): Table
    {
        

        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('firstname')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('lastname')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('position')->sortable()->searchable(),
                // Tables\Columns\TextColumn::make('location.name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('date_hired')->date()->sortable()->searchable(),
                Tables\Columns\TextColumn::make('status')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('user.name')->label('Created By')->sortable()->searchable(),
            ])->defaultSort('id', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make()->hidden(fn (Starter $record): bool => $record->status->value === 'Completed'),                                   
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function isStatusComplete(): bool
    {
        return fn (Model $record): bool => $record->username === 'conrad.lawes';
    } 
    
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStarters::route('/'),
            'create' => Pages\CreateStarter::route('/create'),
            // 'view' => Pages\ViewStarter::route('/{record}'),
            'edit' => Pages\EditStarter::route('/{record}/edit'),
        ];
    }    
}