@extends('admin.layouts.app')

@section('content')

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Часто задаваемые вопросы</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10">
                        <!-- /.card-header -->

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Список вопросов/ответов</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Заголовок</th>
                                        <th style="width: 40px">Редактировать</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty($faqs) && count($faqs))
                                        @foreach($faqs as $key=>$fqs)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$fqs->question}}</td>
                                                <td>
                                                    <a href="#" class="btn btn-secondary btn-sm edit float-right ml-2 remove-faq-btn" data-id="{{$fqs->id}}" title="Edit">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    <a href="{{route('admin.faq.edit', $fqs)}}" class="btn btn-secondary btn-sm edit float-right ml-2" title="Edit">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                {!! $faqs->onEachSide(1)->appends(request()->query())->links('admin.layouts.pagination') !!}

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="col-lg-2">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <a href="{{route('admin.faq.create')}}" type="button" class="btn btn-block btn-primary btn-lg">Добовить вопрос/ответ</a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>



@endsection
